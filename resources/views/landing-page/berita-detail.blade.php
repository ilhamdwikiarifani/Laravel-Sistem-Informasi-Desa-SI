@extends('landing-page.layouts.main')

@section('content')
    <!-- Start Blog Singel Area -->
    <section class="section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="single-inner">
                        <div class="post-details">

                            <div class="main-content-head">
                                <div class="post-thumbnils">
                                    <img class="img-responsive" src="{{ asset('storage/' . $post->foto . '') }}" alt="#">
                                </div>
                                <div class="meta-information">
                                    <h2 class="post-title">
                                        <b href="">{{ $post->title }}</b>
                                    </h2>
                                    <!-- End Meta Info -->
                                    <ul class="meta-info">
                                        {{-- <li>
                                            <a href="javascript:void(0)"> <i class="lni lni-user"></i> Roel
                                                Aufderhar</a>
                                        </li> --}}
                                        <li>
                                            <a href=""><i class="lni lni-calendar"></i>
                                                @php
                                                    $date = new DateTime($post->published_at);
                                                @endphp
                                                {{ $date->format('D, d M Y | H:i:s') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/berita/kategori/' . $post->category->slug . '') }}"><i
                                                    class="lni lni-tag"></i>
                                                {{ $post->category->nama }}</a>
                                        </li>
                                        {{-- @php
                                            $date = new DateTime($post->published_at);
                                            $sekarang = now();
                                            $waktu = $sekarang->diff($date);
                                        @endphp --}}
                                        <li>
                                            <a ><i class="lni lni-eye"></i>{{ $totalViews }} <small>x</small> Dibaca</a>
                                        </li>
                                        <li>
                                            <a ><i class="lni lni-timer"></i> {{ $post->created_at->diffForHumans() }} </a>
                                        </li>
                                    </ul>
                                    <!-- End Meta Info -->
                                </div>
                                <div class="detail-inner">
                                    {!! $post->body !!}
                                </div>
                            </div>

                            <div class="button my-3">
                                <a href="{{ url('/berita') }}" class="btn btn-outline-secondary">kembali</a>
                            </div>

                            <!-- Comments -->

                            {{-- <div class="post-comments">
                                <h3 class="comment-title"><span>Post comments</span></h3>
                                <ul class="comments-list">
                                    <li>
                                        <div class="comment-img">
                                            <img src="https://via.placeholder.com/150x150" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Arista Williamson</h6>
                                                <span class="date">19th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i
                                                        class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Donec aliquam ex ut odio dictum, ut consequat leo interdum. Aenean nunc
                                                ipsum, blandit eu enim sed, facilisis convallis orci. Etiam commodo
                                                lectus
                                                quis vulputate tincidunt. Mauris tristique velit eu magna maximus
                                                condimentum.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="children">
                                        <div class="comment-img">
                                            <img src="https://via.placeholder.com/150x150" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Rosalina Kelian</h6>
                                                <span class="date">15th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i
                                                        class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment-img">
                                            <img src="https://via.placeholder.com/150x150" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Alex Jemmi</h6>
                                                <span class="date">12th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i
                                                        class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-reply-title">Leave a comment</h3>
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="text" name="name" class="form-control form-control-custom"
                                                    placeholder="Website URL" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="text" name="email" class="form-control form-control-custom"
                                                    placeholder="Your Name" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="email" name="email" class="form-control form-control-custom"
                                                    placeholder="Your Email" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="text" name="name" class="form-control form-control-custom"
                                                    placeholder="Phone Number" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <textarea name="#" class="form-control form-control-custom" placeholder="Your Comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button">
                                                <button type="submit" class="btn">Post Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->
@endsection
