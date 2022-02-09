@extends('dashboard.home')
@section('title', 'Orders List')
@section('content')
    <div class="container">
        <h2 class="title">M shop Orders list</h2>
            @if ($success = session()->get('success'))
                <div class="message success">
                    <span class="success_text">{{ $success }}</span>
                </div>
            @endif
        <div class="card accordion title_flex">
            <div class="acc_flex">
                <div class="acc_title">Customer Name</div>
                <div class="acc_title">Phone</div>
                <div class="acc_title">Address</div>
                {{-- <div class="acc_title">Ordered Date</div> --}}
                <div class="acc_title">Action</div>
            </div>
        </div>
        @foreach ($order_users as $users)
            <div class="card accordion">
                <div class="acc_flex acc_data">
                    <i class="bx bx-down-arrow-alt acc_toggle" data-id={{ $users->id }}></i>
                    <div class="">{{ $users->name }}</div>
                    <div><span>{{ $users->phone }}</span></div>
                    <div>
                        <span>{{ $users->address }}
                        </span>
                    </div>
                    {{-- <div>{{ $users->ordered_date }}</div> --}}
                    <div>
                        @if($users->order_status == 1)
                            <a href="{{ route('order#deliver', $users->id) }}" class="btn primary_btn">Pending</a>
                            <a href="{{ route('order#reject', $users->id) }}" class="btn danger_btn">
                                Reject
                            </a>
                        @endif
                    </div>
                </div>
                <div class="acc_panel">

                </div>


            </div>
        @endforeach
        <div>
            {!! $order_users->links('dashboard.custom_paginate') !!}
        </div>

    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //accordion toggle 
        const acc_toggle = document.getElementsByClassName('acc_toggle');
        const panel = document.getElementsByClassName('acc_panel');

        for (let i = 0; i < acc_toggle.length; i++) {
            acc_toggle[i].addEventListener('click', () => {
                let id = acc_toggle[i].getAttribute('data-id');
                panel[i].style.display = panel[i].style.display === 'block' ? 'none' : 'block';
                // console.log(id);
                //jquery ajax to get customer order list
                $.ajax({
                    type: "GET",
                    url: "orders",
                    data: {
                        id
                    },
                    success: function(res) {
                        let data_container = '';
                        res.forEach(order => {
                            data_container += `<div class="item">
                                <span>Order ID: ${order.orderId}</span><br />
                                <span>Brand Name: ${order.p_name}</span><br />
                                <span>Model : ${order.brand}</span><br />
                                <span>Total : ${order.total} MMK</span><br />
                                <span>Quantity : ${order.qty}</span><br />
                                <span>Specifications: ${order.specs}</span>
                                <span class="order_date">Ordered Date: ${order.orderDate}</span>
                            </div>`;
                        });
                        panel[i].innerHTML = data_container;
                        console.log(res);
                    }
                });


            });
        }
    </script>
@endsection
