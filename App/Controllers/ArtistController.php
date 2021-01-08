<?php

namespace App\Controllers;

use App\Libraries\View;
use App\Models\ArtistModel;

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
        if (isset($_GET['artist_id'])) {
            $artist_id = (int)$_GET['artist_id'];
            
            if ($artist_id > 0) {
                if (ArtistModel::existsById($artist_id, 'artists')) {
                    View::render('artist-detail.view', [
                        'artist' => ArtistModel::get($_GET['artist_id']),
                    ]);
                } else {
                    dd('This record does not exist');
                }
            } else {
                dd('Give me a integer!!!');
            }
        } else {
            dd('give me a artist_id!');
        }
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