@extends('layouts.app')

@section('form')


            <div class="card-body">
                    <form method="POST" action="{{ route('store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title"  required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control " name="description"  required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Date (yyyy-mm-dd)</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="date" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="name" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">comments</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="comments" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">image</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="image" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="isSitter">
                                isSitter
                            </label>
                            <input type="checkbox" name="isSitter" class="mt-3 ml-2" style="max-width: 20px;">
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-light">
                                    Create Course
                                </button>
                                <button type="submit" class="btn btn-outline-danger">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
@endsection
