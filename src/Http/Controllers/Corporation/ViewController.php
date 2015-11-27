<?php
/*
This file is part of SeAT

Copyright (C) 2015  Leon Jacobs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

namespace Seat\Web\Http\Controllers\Corporation;

use App\Http\Controllers\Controller;
use Seat\Services\Repositories\Corporation\CorporationRepository;

/**
 * Class ViewController
 * @package Seat\Web\Http\Controllers\Corporation
 */
class ViewController extends Controller
{

    use CorporationRepository;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCorporations()
    {

        $corporations = $this->getAllCorporationsWithAffiliationsAndFilters();

        return view('web::corporation.list', compact('corporations'));

    }

    /**
     * @param $corporation_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSummary($corporation_id)
    {

        $divisions = $this->getCorporationDivisions($corporation_id);
        $sheet = $this->getCorporationSheet($corporation_id);
        $wallet_divisions = $this->getCorporationWalletDivisions($corporation_id);

        return view('web::corporation.summary',
            compact('divisions', 'sheet', 'wallet_divisions'));

    }

}