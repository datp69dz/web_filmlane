@extends('users.layout.app')

@section('content')

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/59662fdd-1ee6-4a9c-8733-3eeb57c22956/daje8hi-18d8ddc5-9c08-477b-a317-953b5a64f5cd.jpg/v1/fill/w_1280,h_427,q_75,strp/the_dark_knight_concept_banner_by_sirbriggsy_daje8hi-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NDI3IiwicGF0aCI6IlwvZlwvNTk2NjJmZGQtMWVlNi00YTljLTg3MzMtM2VlYjU3YzIyOTU2XC9kYWplOGhpLTE4ZDhkZGM1LTljMDgtNDc3Yi1hMzE3LTk1M2I1YTY0ZjVjZC5qcGciLCJ3aWR0aCI6Ijw9MTI4MCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.4O3aFSvEaaWI5z8tb5fDJcyW-F7ZpkLRTT7NCgD6Wm8"></section>
<!-- Normal Breadcrumb End -->

<div style="margin-top: 60px ; margin-bottom: 60px;"class="container">
    <div  class="card__container grid">
        <!--==================== CARD 1 ====================-->
        <article class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">$</span>0
                </div>
                <span class="card__pricing-month">/month</span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <img src="assets/img/free-coin.png" alt="" class="card__header-img">
                </div>
                
                <span class="card__header-subtitle">Free plan</span>
                <h1 class="card__header-title">Basic</h1>
            </header>
            
            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p  class="card__list-description">3 user request</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">10 downloads por day</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Daily content updates</p>
                </li>
            </ul>

            <button class="card__button">Choose this plan</button>
        </article>

        <!--==================== CARD 2 ====================-->
        <article class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">$</span>19
                </div>
                <span class="card__pricing-month">/month</span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <img src="https://www.citypng.com/public/uploads/preview/hd-premium-quality-guaranteed-label-logo-sign-png-11662549202g1cby2r0nr.png" alt="" class="card__header-img">
                </div>

                <span class="card__header-subtitle">Most popular</span>
                <h1 class="card__header-title">Professional</h1>
            </header>
            
            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">100 user request</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Unlimited downloads</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Unlock all features from our site</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Daily content updates</p>
                </li>
            </ul>

            <button class="card__button">Choose this plan</button>
        </article>

        <!--==================== CARD 3 ====================-->
        <article class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">$</span>29
                </div>
                <span class="card__pricing-month">/month</span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <img src="assets/img/enterprise-coin.png" alt="" class="card__header-img">
                </div>

                <span class="card__header-subtitle">For agencies</span>
                <h1 class="card__header-title">Enterprise</h1>
            </header>
            
            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Unlimited  user request</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Unlimited downloads</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Unlock all features from our site</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Daily content updates</p>
                </li>
            </ul>

            <button class="card__button">Choose this plan</button>
        </article>
    </div>
    </div>

</section>
<!-- Signup Section End -->

@endsection
