<?php

namespace RTippin\MessengerUi\Http\Controllers;

use Illuminate\View\View;

class ViewPortalController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('messenger::portal')->with('mode', 5);
    }

    /**
     * @param  string  $thread
     * @return View
     */
    public function showThread(string $thread): View
    {
        return view('messenger::portal')->with([
            'mode' => 0,
            'thread_id' => $thread,
        ]);
    }

    /**
     * @param  string  $alias
     * @param  string  $id
     * @return View
     */
    public function showCreatePrivate(string $alias, string $id): View
    {
        return view('messenger::portal')->with([
            'mode' => 3,
            'alias' => $alias,
            'id' => $id,
        ]);
    }

    /**
     * @param  string  $thread
     * @param  string  $call
     * @return View
     */
    public function showVideoCall(string $thread, string $call): View
    {
        return view('messenger::video')->with([
            'threadId' => $thread,
            'callId' => $call,
        ]);
    }

    /**
     * @param  string  $invite
     * @return View
     */
    public function showJoinWithInvite(string $invite): View
    {
        return view('messenger::invitation')->with([
            'code' => $invite,
            'special_flow' => true,
        ]);
    }
}
