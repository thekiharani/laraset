@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <livewire:categories.list-all />
        </div>
    </div>
</div>
@endsection
