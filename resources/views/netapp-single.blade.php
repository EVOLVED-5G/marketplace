@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ mix('dist/css/netapp-single.css') }}">
@endpush

@section('content')
<section>
    <div class="product-info">
        <div class="content d-flex">
            <div class="product-info__title d-flex me-5">
                <div class="product-info__title--icon me-3">
                    <img loading="lazy" src="{{url($netapp['logo'][0]['url'])}}" alt="product-netapp-icon" style="width: 100px;">
                </div>
                <div class="product-info__title--name">
                    <h2>{{$netapp['name']}}</h2>
                    <p>@if($netapp['published_by'] == 'user') {{$netapp['user']['name']}} @else {{$netapp['business_name']}} @endif</p>
                </div>
                <template>
                    <div class="product-info__title--save d-flex justify-content-center align-items-center">

                        @if(!auth()->check())
                        <span class="tooltiptext"> You have to login/register to
                            save item</span>
                        <a href="#"><i class="far fa-bookmark"></i></a>
                        @else
                        @if($netapp['saved_netapp']!==null)<a href="#" @click="unsaveNetapp({{$netapp['saved_netapp']['id']}},true)"><i class="fa fa-bookmark"></i></a>
                        @else <a href="#" @click="saveNetapp({{$netapp['id']}},{{auth()->user()->id}},true)"><i class="far fa-bookmark" aria-hidden="true"></i></a>
                        @endif
                        @endif
                    </div>
                </template>

            </div>
            <div class="product-info__status d-flex ms-5">
                <p class="product-info__status--template rounded text-note me-3 p-2">Active</p>
                <p class="product-info__status--template rounded text-note me-3 p-2">Version {{$netapp['version']}}</p>
                <p class="product-info__status--template rounded text-note me-3 p-2">Certified</p>
            </div>
        </div>
    </div>
    <div class="content ">
        <div class="product-about d-flex flex-wrap mb-5">
            <div class="product-about__info p-3 me-3">
                <h3>About</h3>
                {!!$netapp['about']!!}
            </div>

            <div class="product-about__extra-info">
                <div class="product-about__extra-info--categories mb-3">
                    Categories
                    <div class="tags-categories p-3">
                        <p class="tags-categories__template text-note ">{{$netapp['category']['name']}}</p>
                    </div>
                </div>
                <div class="product-about__extra-info--support d-flex justify-content-center align-items-center flex-column">
                    <p>If you have any question you can join<br> our community for support</p>
                    <a href="{{ route('support') }}" class="btn btn--primary">Support</a>


                </div>
            </div>
        </div>
        <div class="product-tutorials mb-5">
            <div class="section-title">
                <a data-bs-toggle="collapse" href="javascript:void(0)" data-bs-target="#tutorials" role="button" aria-expanded="false" aria-controls="tutorials" class="collapsed">
                    <h3>Tutorials<i class="fas fa-long-arrow-alt-right ms-5" aria-hidden="true"></i><i class="fas fa-long-arrow-alt-left ms-5" aria-hidden="true"></i></h3>
                </a>
            </div>

            <div class="collapse content p-5" id="tutorials">
                <h2>How to use it</h2>
                {!!$netapp['tutorial_docs']!!}
            </div>

        </div>
        <div class="product-pricing mb-5">
            <div class="section-title">
                <a data-bs-toggle="collapse" href="javascript:void(0)" data-bs-target="#pricing" role="button" aria-expanded="false" aria-controls="pricing" class="collapsed">
                    <h3>Pricing<i class="fas fa-long-arrow-alt-right ms-5" aria-hidden="true"></i><i class="fas fa-long-arrow-alt-left ms-5" aria-hidden="true"></i></h3>
                </a>
            </div>

            <div class="collapse content p-5" id="pricing">
                @if(count($netapp['api_endpoints'])>0)
                <div id="pay-as-you-go">
                    <h3>Pay as you go</h3>
                    <p>Pay depending on the usage</p>

                    <div class="calls-choices mt-5">
                        <div class="container mb-5" style="max-width: 730px">
                            <div class="row gx-3 mb-3">
                                @forelse($netapp['api_endpoints'] as $endpoint)
                                <div class="col text-center ps-0">
                                    <div class="p-3 border bg-light">
                                        <h4 class="mb-4">For calls made to {{$endpoint['url']}}</h4>
                                        @forelse($endpoint['paymentplan'] as $paymentplan)
                                        <div class="row row-calls mb-2 ms-2 me-2 p-2">
                                            <div class="col col-calls">
                                                <h4 class="mb-0">{{$paymentplan['from']}}-@if($paymentplan['unlimited']) Unlimited @else {{$paymentplan['to']}} @endif</h4> <span>calls</span>
                                            </div>
                                            <div class="col">
                                                <h4 class="mb-0">{{$paymentplan['cost']}}€</h4>
                                                <span>@if($paymentplan['cost']==0) (no cost) @elseif($paymentplan['plan_category']=="percall")(/call) @else (Fixed)@endif</span>
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                                @empty
                                @endforelse

                                <!-- <div class="col text-center pe-0">
                                    <div class="p-3 border bg-light">
                                        <h4 class="mb-4">For calls made to /endpoint-2</h4>
                                        <h2>0.15 € <br>
                                            <span> /call</span>
                                        </h2>
                                    </div>

                                </div> -->
                            </div>
                            @if(auth()->check() && $netapp['user_id']!==auth()->user()->id)
                            <div class="row ">
                                <a href="#" class="btn btn--primary" @click="purchaseNetapp({
                                    netapp_id:{{$netapp['id']}},
                                    user_id:{{auth()->user()->id}},
                                    payment_plan_id: null,
                                  })">Purchase</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @else

                <div id="once-off">
                    <h3>Once-off</h3>
                    <p>Purchase and get unlimited access to the net-app's functionality</p>

                    <div class="calls-choices mt-5">
                        <div class="container mb-5">
                            <div class="text-center px-0 mb-3">
                                <div class="p-3 border bg-light">
                                    <h4 class="mb-4">Once-off</h4>
                                    <h2>{{$netapp['fix_price']}} €</h2>
                                </div>
                            </div>
                            @if($netapp['purchased_netapp'] ==null)
                            <div class="row">
                                <!-- Button trigger modal -->
                                @if(auth()->check() && $netapp['user_id']!==auth()->user()->id)
                                <a href="#" class="btn btn--primary" @click="purchaseNetapp({
                                    netapp_id:{{$netapp['id']}},
                                    user_id:{{auth()->user()->id}},
                                    payment_plan_id: null,
                                  })">Purchase</a>
                                @endif



                                <!-- Modal -->
                                <purchased-netapp-modal :open="this.showPurchasedModel"></purchased-netapp-modal>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>


    </div>

</section>
@endsection
@push('scripts')
@endpush