@extends('frontend.layouts.master')

@section('title', 'E-TECH || Blog Detail page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Ana Sayfa<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">{{ $post->title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Single -->
    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <div class="image">
                                    <img src="{{ $post->photo }}" alt="{{ $post->photo }}">
                                </div>
                                <div class="blog-detail">
                                    <h2 class="blog-title">{{ $post->title }}</h2>
                                    <div class="blog-meta">
                                        <span class="author"><a href="javascript:void(0);"><i class="fa fa-user"></i>By
                                                {{ $post->author_info['name'] }}</a><a href="javascript:void(0);"><i
                                                    class="fa fa-calendar"></i>{{ $post->created_at->format('M d, Y') }}</a><a
                                                href="javascript:void(0);"><i class="fa fa-comments"></i>Comment
                                                ({{ $post->allComments->count() }})</a></span>
                                    </div>
                                    <div class="sharethis-inline-reaction-buttons"></div>
                                    <div class="content">
                                        @if ($post->quote)
                                            <blockquote> <i class="fa fa-quote-left"></i> {!! $post->quote !!}
                                            </blockquote>
                                        @endif
                                        <p>{!! $post->description !!}</p>
                                    </div>
                                </div>
                                <div class="share-social">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="content-tags">
                                                <h4>Tags:</h4>
                                                <ul class="tag-inner">
                                                    @php
                                                        $tags = explode(',', $post->tags);
                                                    @endphp
                                                    @foreach ($tags as $tag)
                                                        <li><a href="javascript:void(0);">{{ $tag }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @auth
                            @else
                                <!--/ End Form -->
                            @endauth

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <form class="form" method="GET" action="{{ route('blog.search') }}">
                                <input type="text" placeholder="Search Here..." name="search">
                                <button class="button" type="sumbit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Blog Kategorileri</h3>
                            <ul class="categor-list">
                                {{-- {{count(Helper::postCategoryList())}} --}}
                                @foreach (Helper::postCategoryList('posts') as $cat)
                                    <li><a href="#">{{ $cat->title }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">Son Yazılar</h3>
                            @foreach ($recent_posts as $post)
                                <!-- Single Post -->
                                <div class="single-post">
                                    <div class="image">
                                        <img src="{{ $post->photo }}" alt="{{ $post->photo }}">
                                    </div>
                                    <div class="content">
                                        <h5><a href="#">{{ $post->title }}</a></h5>
                                        <ul class="comment">
                                            <li><i class="fa fa-calendar"
                                                    aria-hidden="true"></i>{{ $post->created_at->format('d M, y') }}</li>
                                            <li><i class="fa fa-user" aria-hidden="true"></i>
                                                {{ $post->author_info->name ?? 'Anonymous' }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Post -->
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget side-tags">
                            <h3 class="title">Tags</h3>
                            <ul class="tag">
                                @foreach (Helper::postTagList('posts') as $tag)
                                    <li><a href="">{{ $tag->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Single -->
@endsection
@push('styles')
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons'
        async='async'></script>
@endpush
