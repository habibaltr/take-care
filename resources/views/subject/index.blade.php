@extends('layouts.app')
@section('mainContent')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="content-wrapper">
       <section class="content">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-12">
                       <div class="card">
                           <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="d-flex flex-row justify-content-start text-bold">
                                            <h7>Class - Class List</h7>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="flex-row text-right">
                                        <a class="btn btn-sm btn-secondary my-2" title="Add Subject" href="{{route('subject.add')}}" style="line-height: 1.5 !important;"><i class="fas fa-pus"></i>Add New Subject</a>
                                        </div>
                                    </div>
                                </div>
                           </div>
	            <div class="row card-body">
                    @if(isset($allClassLists))
                    @foreach($allClassLists as $allClass)
	                <div class="col-md-2 text-center mb-3">
                        <div class="card-body pl-0 pr-0 pb-3 shadow rounded">
                            <a href="{{route('subject.class',$allClass->id)}}"> 
                                <svg xmlns="http://www.w3.org/2000/svg" height="5em" viewBox="0 0 576 512">
                                    <style>svg{fill:#115cdf}</style><path d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32V448c0 35.3 28.7 64 64 64H448.5c35.5 0 64.2-28.8 64-64.3l-.7-160.2h32zM288 160a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM176 400c0-44.2 35.8-80 80-80h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H192c-8.8 0-16-7.2-16-16z"/>
                                </svg>
                            </a>
                            <h3>{{$allClass->class}}<hr class="m-1"></h3>
                            <a href="{{route('subject.class',$allClass->id)}}" class="btn btn-link mb-0 pb-0"> 
                            <svg class="svg-inline--fa fa-folder-open fa-w-12 text-warning" height="1.25em" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="folder-open" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M572.694 292.093L500.27 416.248A63.997 63.997 0 0 1 444.989 448H45.025c-18.523 0-30.064-20.093-20.731-36.093l72.424-124.155A64 64 0 0 1 152 256h399.964c18.523 0 30.064 20.093 20.73 36.093zM152 224h328v-48c0-26.51-21.49-48-48-48H272l-64-64H48C21.49 64 0 85.49 0 112v278.046l69.077-118.418C86.214 242.25 117.989 224 152 224z"></path></svg>
                             Subject  
                            </a> 
                        </div>
                    </div>
                    @endforeach
                    @endif
	            </div>
            </div>
            </div>
            </div>
            </div>
        </section>
    </div>
@endsection

