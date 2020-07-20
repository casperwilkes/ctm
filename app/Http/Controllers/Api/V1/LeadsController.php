<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadsRequest;
use App\Leads;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPUnit\Util\Json;

/**
 * Class LeadsController
 * @package App\Http\Controllers\Api\V1
 */
class LeadsController extends Controller {

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse {
        /**
         * @todo allow request to user 'paginate' key to adjust amount
         */
        $leads = Leads::paginate(10);

        return response()->json($leads);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LeadsRequest $request
     * @return JsonResponse
     */
    public function store(LeadsRequest $request): JsonResponse {
        $lead = new Leads($request->validated());
        $lead->save();

        return response()->json($lead, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Leads $leads
     * @return JsonResponse
     */
    public function show(Leads $leads): JsonResponse {
        return response()->json($leads);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LeadsRequest $request
     * @param Leads $leads
     * @return JsonResponse
     */
    public function update(LeadsRequest $request, Leads $leads): JsonResponse {
        $leads->update($request->validated());

        return response()->json($leads, 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Leads $leads
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Leads $leads) {
        $leads->delete();

        return response()->json([], 204);
    }
}
