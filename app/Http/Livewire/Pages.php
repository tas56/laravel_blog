<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Page;
use App\Models\User;

class Pages extends Component
{
    public $pages, $title, $body, $page_id, $published;
    public $isOpen = 0;
    public $isOpenShow = 0;
    public $isPublished = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $user = auth()->user();
        $this->pages = $user->pages;
        return view('livewire.pages');
    }
    public function index() {

        return view('livewire.posts_public');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function openShowModal()
    {
        $this->isOpenShow = true;
    }
    public function isPublished()
    {
        $this->isPublished = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function closeShowModal()
    {
        $this->isOpenShow = false;
    }
    public function isUnpublished()
    {
        $this->isPublished = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->page_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Page::updateOrCreate(['id' => $this->page_id], [
            'title' => $this->title,
            'body' => $this->body,
            'published' => true

        ]);

        session()->flash('message',
            $this->page_id ? 'Page Updated Successfully.' : 'Page Created Successfully.');

        $this->closeModal();
        $this->closeShowModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $this->page_id = $id;
        $this->title = $page->title;
        $this->body = $page->body;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Page::find($id)->delete();
        session()->flash('message', 'Page Deleted Successfully.');
    }
    public function publish($id)
    {
        $page = Page::findOrFail($id);
        $this->page_id = $id;
        $this->published = true;
        $page->published = 0;
        $this->isPublished();
        session()->flash('message', 'Page Published Successfully.');
    }


    public function view($id)
    {
        $page = Page::findOrFail($id);
        $this->page_id = $id;
        $this->title = $page->title;
        $this->body = $page->body;

        $this->openShowModal();
    }


    public function unpublish($id)
    {
        $page = Page::findOrFail($id);
        $this->page_id = $id;
        $this->published = false;
        $page->published = 0;
        $this->isUnpublished();
        session()->flash('message', 'Page Unpublished Successfully.');
    }
}
