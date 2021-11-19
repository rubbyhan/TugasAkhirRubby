<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Question;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MBTIController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function startTest(){
        $code = $this->generateCode();

        History::create([
            'code' => $code
        ]);

        return redirect()->route('test.question', $code);
    }

    private function generateCode(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 10; $i++){
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public function showQuestion($code){
        $data = History::where('code', $code)->get();
        if ($data->isEmpty()){ return view('404');}

        $data = $data->first();
        $totalQuestion = Question::all()->count();

        if ($data->finished == $totalQuestion)
            return redirect()->route('test.score', $code);

        $questionNumber = $data->finished + 1;
        $question = Question::find($questionNumber);

        return view('questions', compact('questionNumber', 'question', 'code', 'totalQuestion'));
    }

    public function submitAnswer(Request $request, $code){
        $history = History::where('code', $code)->first();

        $history->update([
            'finished' => $history->finished + 1
        ]);

        $typeQuestionNow = Question::find($history->finished)->type;
        $this->generateScore($code, $typeQuestionNow, $request->answer);

        return redirect()->route('test.question', $code);
    }

    private function generateScore($code, $type, $answer){
        $history = History::where('code', $code)->first();

        if ($type->canMinus()){
            switch ($type->name){
                case 'IE':
                    if ($answer == 1) $this->updateDatabase($history, 'scoreIE', 1);
                    else $this->updateDatabase($history, 'scoreIE', -1);
                    return;

                case 'SN':
                    if ($answer == 1) $this->updateDatabase($history, 'scoreSN', 1);
                    else $this->updateDatabase($history, 'scoreSN', -1);
                    return;

                case 'TF':
                    if ($answer == 1) $this->updateDatabase($history, 'scoreTF', 1);
                    else $this->updateDatabase($history, 'scoreTF', -1);
                    return;

                case 'PJ':
                    if ($answer == 1) $this->updateDatabase($history, 'scorePJ', 1);
                    else $this->updateDatabase($history, 'scorePJ', -1);
                    return;
            }
        } else {
            switch ($type->name){
                case 'R':
                    if ($answer == 1) $this->updateDatabase($history, 'scoreR', 1);
                    else $this->updateDatabase($history, 'scoreR', 0);
                    return;

                case 'I':
                    if ($answer == 1) $this->updateDatabase($history, 'scoreI', 1);
                    else $this->updateDatabase($history, 'scoreI', 0);
                    return;

                case 'A':
                    if ($answer == 1) $this->updateDatabase($history, 'scoreA', 1);
                    else $this->updateDatabase($history, 'scoreA', 0);
                    return;

                case 'S':
                    if ($answer == 1) $this->updateDatabase($history, 'scoreS', 1);
                    else $this->updateDatabase($history, 'scoreS', 0);
                    return;

                case 'E':
                    if ($answer == 1) $this->updateDatabase($history, 'scoreE', 1);
                    else $this->updateDatabase($history, 'scoreE', 0);
                    return;

                case 'C':
                    if ($answer == 1) $this->updateDatabase($history, 'scoreC', 1);
                    else $this->updateDatabase($history, 'scoreC', 0);
                    return;
            }
        }
    }

    private function updateDatabase($history, $typeData, $addedScore){
        $beforeData = $history->$typeData;

        $history->update([
            $typeData => $beforeData + $addedScore
        ]);
    }

    public function showScoreInfo($code){
        $data = History::where('code', $code)->get();
        if ($data->isEmpty()){ return view('404');}

        $data = $data->first();
        $test =[
            'scoreIE' => $data->scoreIE,
            'scoreSN' => $data->scoreSN,
            'scoreTF' => $data->scoreTF,
            'scorePJ' => $data->scorePJ,
            'scoreR' => $data->scoreR,
            'scoreI' => $data->scoreI,
            'scoreA' => $data->scoreA,
            'scoreS' => $data->scoreS,
            'scoreE' => $data->scoreE,
            'scoreC' => $data->scoreC
        ];
        return response()->json($test, Response::HTTP_OK);
        $response = Http::get('localhost:33000/answer', [
            'scoreIE' => $data->scoreIE,
            'scoreSN' => $data->scoreSN,
            'scoreTF' => $data->scoreTF,
            'scorePJ' => $data->scorePJ,
            'scoreR' => $data->scoreR,
            'scoreI' => $data->scoreI,
            'scoreA' => $data->scoreA,
            'scoreS' => $data->scoreS,
            'scoreE' => $data->scoreE,
            'scoreC' => $data->scoreC
        ])->json();

        return view('score', compact('response'));
    }
}
