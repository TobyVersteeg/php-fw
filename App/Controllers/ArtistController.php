<?php

namespace App\Controllers;

use App\Libraries\View;
use App\Models\ArtistModel;
use Exception;
use stdClass;

class ArtistController
{

    public function index()
    {
        $artists = ArtistModel::all();

        View::render('artists.view', [
            'artists' => $artists,
        ]);
    }

    public function show()
    {
        if (isset($_GET['artist_id']) && (int)$_GET['artist_id'] > 0 && !is_null(ArtistModel::get($_GET['artist_id']))) {
            $artist = ArtistModel::get($_GET['artist_id']);
            return View::render('artist-detail.view', $vars = ['artists' => $artist]);
        }

        return View::render('error404.view');
    }

    /**
     * Store a artist record into the database
     */
    public function store()
    {
        
    }

    /**
     * Updates a artist record into the database
     */
    public function update()
    {
        
    }

    /**
     * Archive a artist record into the database
     */
    public function destroy(int $id)
    {

    }

}