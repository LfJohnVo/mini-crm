<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanieRequest;
use App\Http\Requests\UpdateCompanieRequest;
use App\Repositories\CompanieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
        $companies = $this->companieRepository->all();

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
    public function store(CreateCompanieRequest $request)
    {
        $input = $request->all();

        $companie = $this->companieRepository->create($input);

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
    public function update($id, UpdateCompanieRequest $request)
    {
        $companie = $this->companieRepository->find($id);

        if (empty($companie)) {
            Flash::error('Companie not found');

            return redirect(route('companies.index'));
        }

        $companie = $this->companieRepository->update($request->all(), $id);

        Flash::success('Companie updated successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified Companie from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companie = $this->companieRepository->find($id);

        if (empty($companie)) {
            Flash::error('Companie not found');

            return redirect(route('companies.index'));
        }

        $this->companieRepository->delete($id);

        Flash::success('Companie deleted successfully.');

        return redirect(route('companies.index'));
    }
}
