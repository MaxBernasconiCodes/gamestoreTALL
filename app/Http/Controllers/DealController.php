<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DealController extends Controller
{
    public function index(Request $request)
    {
        $searchParameters = explode(",", $request->input('q'));
        $deals = $this->getAllDeals();
        $deals = $this->filterDeals($deals, $searchParameters);
        return  $deals;
    }

    public static function getAllDeals(){
        $data = Storage::get('data/deals.json');
        $deals = json_decode($data, true);
        return $deals;
    }

    public function filterDeals($list, $searchParameters){
        $results = [];
        if (count($searchParameters) == 1) {
            $operation = $this->determineOperation($searchParameters[0]);
            $results =  $this->applyFilter($list, $operation);
        }

        else if (count($searchParameters) > 1) {
            $results = $list;
            foreach ($searchParameters as $searchParameter) {
                $operation = $this->determineOperation($searchParameter);
                $results = $this->applyFilter($results, $operation);
            }
        }
        return $results;
    }

    private function determineOperation($string)
    {
        $operation = [
            'property' => 'title',
            'operator' => ':',
            'value' => trim($string),
        ];

        if (Str::startsWith($string, 'salePrice') && strlen($string) > 10) {
            $operation['property']  = 'salePrice';
            $operation['operator']  = substr(trim(substr($string, 9)), 0, 1);
            $operation['value']     = substr(trim(substr($string, 9)), 1);
        } else if (Str::startsWith($string, 'title') && strlen($string) > 6) {
            $operation['property'] = 'title';
            $operation['operator'] = substr(trim(substr($string, 5)), 0, 1);
            $operation['value']    = substr(trim(substr($string, 5)), 1);
        }
        return $operation;
    }

    private function applyFilter($deals, $operation)
    {
        $results = $deals;
        if (!empty($operation['value'])) {
            if ($operation['property'] == 'title') {
                switch ($operation['operator']) {
                    case ':':
                        $results = array_filter($deals, function ($deal) use ($operation) { {
                                return str_contains(strtolower($deal['title']), strtolower($operation['value'])) !== false;
                            }
                        });
                        break;

                    case '=':
                        $results = array_filter($deals, function ($deal) use ($operation) { {
                                return $deal[$operation['property']] === $operation['value'];
                            }
                        });
                        break;

                    default:
                        $results = [];
                        break;
                }
            } elseif ($operation['property'] == 'salePrice') {
                switch ($operation['operator']) {
                    case '<':
                        $results = array_filter($deals, function ($deal) use ($operation) { {
                                return $deal[$operation['property']] < $operation['value'];
                            }
                        });
                        break;

                    case '>':
                        $results = array_filter($deals, function ($deal) use ($operation) { {
                                return $deal[$operation['property']] > $operation['value'];
                            }
                        });
                        break;
                    default:
                        $results = [];
                        break;
                }
            } else {
                $results = [];
            }
        }

        return $results;
    }
}
