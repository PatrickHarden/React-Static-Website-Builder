@extends('spark::layouts.app', ['body_class' => 'home'])

@section('content')
<home :user="user" inline-template>
    <article>
        <section id="hero" class="parallax-window" data-parallax="scroll" data-speed="0.6" data-position-y="center" data-image-src="https://s3-us-west-2.amazonaws.com/attorneywebbuilder/files/2018/05/awb-hero-01.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>EFFECTIVE WEBSITES</h1>
                        <h2>EXCLUSIVELY FOR LAWYERS</h2>
                        <p>Lawyers are a unique breed. With the myriad of practice types and marketing limitations from state to state, we know lawyers and how to market them online.</p>
                        <p>
                            <a class="btn btn-hollow" href="/pro">Launch Your Website</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 aboutImg"></div>
                    <div class="col-sm-6">
                        <h2>Have People Talking About You In Seconds!</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempor mauris id nunc pellentesque eleifend. Proin a viverra justo. Vivamus posuere risus ut nisl convallis mattis. Phasellus placerat lacinia dolor, nec aliquet lectus sodales non. Mauris vulputate quam ac lacus ullamcorper auctor.</p>
                        <a class="btn btn-accent" href="/pro">View Pricing</a>  <a class="btn btn-hollow" href="/faq">Read Our Q/A</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-push-2">
                        TESTIMONIALS HERE
                    </div>
                </div>
            </div>
        </section>
    </article>
</home>
@endsection