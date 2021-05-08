<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;

class Posts extends Component
{
    public $posts, $title, $body, $post_id, $published;
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
        $this->posts = $user->posts;
        return view('livewire.posts');
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
        $this->post_id = '';
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

        Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'body' => $this->body,
            'published' => true
        ]);

        session()->flash('message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');

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
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }

    public function view($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->openShowModal();
    }

    public function publish($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->published = true;
        $post->published = 0;
        $this->isPublished();
        session()->flash('message', 'Post Published Successfully.');
    }

    public function unpublish($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->published = false;
        $post->published = 0;
        $this->isUnpublished();
        session()->flash('message', 'Post Unpublished Successfully.');
    }
}
