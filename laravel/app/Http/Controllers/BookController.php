<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Verse;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getAll()
    {
        $book =  Book::query('*')->get();


        if ($book->count() > 0) {
            $result = [

                'metadata' => [
                    'result' => 1,
                    'output' => [
                        'raw' => 'Sucesso ao carregar.',
                    ],
                    'version' => 'v1',
                    'status' => 'Success',
                ],
                'data' => $book,
            ];
        } else {
            $result = [
                'metadata' => [
                    'result' => 0,
                    'output' => [
                        'raw' => 'Erro ao carregar.',
                    ],
                    'version' => 'v1',
                    'status' => 'Error'
                ]

            ];
        }
        return $result;
    }
    public function getById($id){

        $chapiter =  Verse::select('*')->where('ver_liv_id',$id)->where('ver_vrs_id',1)->get();


        if ($chapiter->count() > 0) {
            $result = [

                'metadata' => [
                    'result' => 1,
                    'output' => [
                        'raw' => 'Sucesso ao carregar.',
                    ],
                    'version' => 'v1',
                    'status' => 'Success',
                ],
                'data' => $chapiter,
            ];
        } else {
            $result = [
                'metadata' => [
                    'result' => 0,
                    'output' => [
                        'raw' => 'Erro ao carregar.',
                    ],
                    'version' => 'v1',
                    'status' => 'Error'
                ]

            ];
        }
        return $result;
    }
    public function getByChapter($id, $versicules){

        $chapiter =  Verse::select('ver_texto')->where('ver_liv_id',$id)->where('ver_capitulo',$versicules)->where('ver_vrs_id',1)->get();


        if ($chapiter->count() > 0) {
            $result = [

                'metadata' => [
                    'result' => 1,
                    'output' => [
                        'raw' => 'Sucesso ao carregar.',
                    ],
                    'version' => 'v1',
                    'status' => 'Success',
                ],
                'data' => $chapiter,
            ];
        } else {
            $result = [
                'metadata' => [
                    'result' => 0,
                    'output' => [
                        'raw' => 'Erro ao carregar.',
                    ],
                    'version' => 'v1',
                    'status' => 'Error'
                ]

            ];
        }
        return $result;
    }
}
