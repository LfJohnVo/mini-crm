<?php

namespace App\Http\Controllers;

use App\Functions\comprobarDominio;
use App\Http\Requests\CreateCompanieRequest;
use App\Http\Requests\UpdateCompanieRequest;
use App\Repositories\CompanieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;
use App\Models\Companie;
use App\Functions\email;

class CompanieController extends AppBaseController
{
    /** @var  CompanieRepository */
    private $companieRepository;

    public function __construct(CompanieRepository $companieRepo)
    {
        $this->companieRepository = $companieRepo;
    }

    /**
     * Display a listing of the Companie.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $companies = $this->companieRepository->paginate(10);

        return view('companies.index')
            ->with('companies', $companies);
    }

    /**
     * Show the form for creating a new Companie.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created Companie in storage.
     *
     * @param CreateCompanieRequest $request
     *
     * @return Response
     */
    public function store()
    {
        //d(request()->all());
        /*$input = request()->validate([
            'name' => ['required', 'string'],
            'email' => ['email'],
            'website' => array(
                'regex: /^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'
            ),
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);*/
        $input = request()->validate([
            'name' => ['required', 'string'],
            'email' => [''],
            'website' => [''],
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (empty($input['logo'])) {
            $companie = new Companie;
            $companie->name = $input['name'];
            if ($input['email'] != NULL) {
                $companie->email = $input['email'];
            }
            if ($input['website'] != NULL) {
                $companie->website = $input['website'];
            }
            $companie->save();
        } else {
            $image = $input['logo'];
            $fileName = sha1_file($image->getRealPath()).''.date("His").''.$image->getClientOriginalName();
            $image->move('uploads', $fileName);
            $nombre = $fileName;
            $ruta = "/uploads/$nombre";
            //dd($nombre_tabla);
            $companie = new Companie;
            $companie->name = $input['name'];
            if ($input['email'] != NULL) {
                $companie->email = $input['email'];
            }
            if ($input['website'] != NULL) {
                $companie->website = $input['website'];
            }
            $companie->logo = $ruta;
            $companie->save();
        }


        Flash::success('Companie saved successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Display the specified Companie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companie = $this->companieRepository->find($id);

        if (empty($companie)) {
            Flash::error('Companie not found');

            return redirect(route('companies.index'));
        }

        return view('companies.show')->with('companie', $companie);
    }

    /**
     * Show the form for editing the specified Companie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companie = $this->companieRepository->find($id);

        if (empty($companie)) {
            Flash::error('Companie not found');

            return redirect(route('companies.index'));
        }

        return view('companies.edit')->with('companie', $companie);
    }

    /**
     * Update the specified Companie in storage.
     *
     * @param int $id
     * @param UpdateCompanieRequest $request
     *
     * @return Response
     */
    public function update()
    {
        $input = request()->validate([
            'id' => [''],
            'name' => ['required', 'string'],
            'email' => [''],
            'website' => [''],
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $companie = $this->companieRepository->find($input['id']);

        if (empty($companie)) {
            Flash::error('Companie not found');

            return redirect(route('companies.index'));
        }

        if (empty($input['logo'])) {
            if ($input['name'] != null) {
                $companie->name = $input['name'];
            }
            if ($input['email'] != null) {
                $companie->email = $input['email'];
            }
            if ($input['website'] != null) {
                $companie->website = $input['website'];
            }
            $companie->save();
        } else {
            if ($companie->logo != NULL) {
                unlink(public_path($companie->logo));
            }
            $image = $input['logo'];
            $fileName = sha1_file($image->getRealPath()).''.date("His").''.$image->getClientOriginalName();
            $image->move('uploads', $fileName);
            $nombre = $fileName;
            $ruta = "/uploads/$nombre";
            $companie->logo = $ruta;
            if ($input['name'] != null) {
                $companie->name = $input['name'];
            }
            if ($input['email'] != null) {
                $companie->email = $input['email'];
            }
            if ($input['website'] != null) {
                $companie->website = $input['website'];
            }
            $companie->save();
        }
        //$companie = $this->companieRepository->update($request->all(), $id);

        Flash::success('Companie updated successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified Companie from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $companie = $this->companieRepository->find($id);
        unlink(public_path($companie->logo));

        if (empty($companie)) {
            Flash::error('Companie not found');

            return redirect(route('companies.index'));
        }

        $this->companieRepository->delete($id);

        Flash::success('Companie deleted successfully.');

        return redirect(route('companies.index'));
    }
}
