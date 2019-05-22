<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionResquest;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate(5);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionResquest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect(route('questions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(Question $questions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionResquest $request, Question $question)
    {
        $question->update($request->only('title', 'body'));
        return redirect('/questions')->with('success', 'your question has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $questions)
    {
        //
    }
}
