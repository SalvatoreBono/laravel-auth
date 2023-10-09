@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="bg-home-page d-flex flex-column flex-grow-1 overflow-auto main-vh pt-3 pb-3 text-center text-md-start">
        <div class="container d-flex align-items-center vh-100">
            <div class="row flex-column-reverse flex-md-row justify-content-center align-items-center">
                <div class="col-12 col-md-6">
                    <h3 class="display-5 fw-bold">
                        Hi, It's Me
                    </h3>
                    <h1 class="display-1 fw-bold">I'm <span style="color: #bf94ff">Salvatore</span></h1>
                    <p class="col-md-8 fs-4">I'm a Junior Full Stack Web Developer, I'm excited to share with you the
                        projects
                        and skills I've been honing on my journey in the world of web development. My goal is continue
                        learning
                        and growing in this dynamic field.
                    </p>
                    <div class="d-flex justify-content-center  justify-content-md-start">
                        <a class="nav-link" target="_blank" href="https://www.linkedin.com/in/salvatore-bono-692824255/">
                            <div class="link-profile d-flex align-items-center justify-content-center">
                                <i class="fa-brands fa-linkedin-in fa-xl"></i>
                            </div>
                        </a>
                        <a class="nav-link pe-3 ps-3" target="_blank" href="https://www.instagram.com/salvatore__bono/">
                            <div class="link-profile d-flex align-items-center justify-content-center">
                                <i class="fa-brands fa-instagram fa-xl"></i>
                            </div>
                        </a>
                        <a class="nav-link" target="_blank" href="https://www.instagram.com/salvatore__bono/">
                            <div class="link-profile d-flex align-items-center justify-content-center">
                                <i class="fa-brands fa-github fa-xl"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 pb-3 pb-md-0">
                    <img class="media-width" src="/img/image.png" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
