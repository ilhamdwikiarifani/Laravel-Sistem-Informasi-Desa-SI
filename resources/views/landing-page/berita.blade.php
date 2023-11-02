@extends('landing-page.layouts.main')

@section('content')
    <!-- Start Blog Singel Area -->
    <section class="section blog-section blog-list">
        <div class="container">


            <div class="row" style="margin-top:-40px">
                <div class="col-12">
                    <!-- Start Single Blog -->
                    <div class="single-blog">
                        <div class="blog-img" style="height:260px !important; overflow:hidden">
                            <a href="{{ url('/berita/' . $head_berita->slug . '') }}">
                                <img src="{{ asset('storage/' . $head_berita->foto . '') }}" alt="">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="row">
                                <div class="col-6 text-left">
                                    <a class="category"
                                        href="{{ url('/berita/kategori/' . $head_berita->category->slug . '') }}">{{ $head_berita->category->nama }}
                                    </a>
                                </div>
                                <div class="col-6 text-right">
                                    <a><i class="lni lni-timer"></i>
                                        <small>{{ $head_berita->created_at->diffForHumans() }}</small> </a>
                                </div>
                            </div>
                            <h4>
                                <a href="{{ url('/berita/' . $head_berita->slug . '') }}">{{ $head_berita->title }}</a>
                            </h4>
                            <p>{{ $head_berita->excerpt }}</p>
                            {{-- <div class="button">
                                <a href="{{ url('/berita/' . $head_berita->slug . '') }}" class="btn">Selengkapnya
                                    ...</a>
                            </div> --}}
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="row">
                        @if ($posts->count() != 0)
                            {{-- <h4 class="mb-3 mt-4 text-center heading-6"> {{ $title }}</h4> --}}
                            <table>
                                @foreach ($posts as $post)
                                    @if ($post->id != $head_berita->id)
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <!-- Start Single Blog -->
                                            <div class="single-blog">
                                                <div class="blog-img">
                                                    <a href="{{ url('/berita/' . $post->slug . '') }}">
                                                        <img width="370px" height="215px"
                                                            src="{{ asset('storage/' . $post->foto . '') }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-content">
                                                    <div class="row">
                                                        <div class="col-6 text-left">
                                                            <a class="category"
                                                                href="{{ url('/berita/kategori/' . $post->category->slug . '') }}">{{ $post->category->nama }}
                                                            </a>
                                                        </div>
                                                        <div class="col-6 text-right">
                                                            <a><i class="lni lni-timer"></i>
                                                                <small>{{ $post->created_at->diffForHumans() }}</small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h4>
                                                        <a
                                                            href="{{ url('/berita/' . $post->slug . '') }}">{{ $post->title }}</a>
                                                    </h4>
                                                    <p>{{ $post->excerpt }}</p>
                                                    <div class="button">
                                                        <a href="{{ url('/berita/' . $post->slug . '') }}"
                                                            class="btn">Selengkapnya
                                                            ...</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Blog -->
                                        </div>
                                    @endif
                                @endforeach
                            </table>
                            <!-- Pagination -->
                            <div class="pagination center blog-grid-page">
                                <ul class="pagination-list">
                                    <li>{!! $posts->links() !!}</li>
                                </ul>
                            </div>
                            <!--/ End Pagination -->
                        @else
                            <h4 class="text-gray-600 text-center mt-4" style="color:grey">Record Data Berita Tidak Ada</h4>
                        @endif
                    </div>

                </div>
                <aside class="col-lg-4 col-md-12 col-12">
                    <div class="sidebar blog-grid-page">
                        <!-- Start Single Widget -->
                        {{-- <div class="widget search-widget">
                            <h5 class="widget-title">Search This Site</h5>
                            <form action="#">
                                <input type="text" placeholder="Search Here...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div> --}}
                        <!-- End Single Widget -->


                        <!-- Start Single Widget -->
                        <div class="widget categories-widget">
                            @include('landing-page.categories')
                        </div>
                        <!-- End Single Widget -->

                        <!-- Start Single Widget -->

                        {{-- <div class="widget popular-feeds">
                            <h5 class="widget-title">Featured Posts</h5>
                            <div class="popular-feed-loop">
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <a class="feed-img" href="blog-single-sidebar.html">
                                            <img src="https://via.placeholder.com/200x200" alt="#">
                                        </a>
                                        <h6 class="post-title"><a href="blog-single-sidebar.html">What information
                                                is
                                                needed for shipping?</a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 05th Nov
                                            2023</span>
                                    </div>
                                </div>
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <a class="feed-img" href="blog-single-sidebar.html">
                                            <img src="https://via.placeholder.com/200x200" alt="#">
                                        </a>
                                        <h6 class="post-title"><a href="blog-single-sidebar.html">Interesting fact
                                                about
                                                gaming consoles</a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 24th March
                                            2023</span>
                                    </div>
                                </div>
                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <a class="feed-img" href="blog-single-sidebar.html">
                                            <img src="https://via.placeholder.com/200x200" alt="#">
                                        </a>
                                        <h6 class="post-title"><a href="blog-single-sidebar.html">Electronics,
                                                instrumentation & control engineering </a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> 30th Jan
                                            2023</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!-- End Single Widget -->

                        <!-- Start Single Widget -->

                        {{-- <div class="widget popular-tag-widget">
                            <h5 class="widget-title">Popular Tags</h5>
                            <div class="tags">
                                <a href="javascript:void(0)">#electronics</a>
                                <a href="javascript:void(0)">#cpu</a>
                                <a href="javascript:void(0)">#gadgets</a>
                                <a href="javascript:void(0)">#wearables</a>
                                <a href="javascript:void(0)">#smartphones</a>
                            </div>
                        </div> --}}

                        <!-- End Single Widget -->
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->
@endsection
