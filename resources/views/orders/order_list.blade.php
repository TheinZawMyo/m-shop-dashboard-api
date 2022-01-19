@extends('dashboard.home')
@section('title', 'Orders List')
@section('content')
    <div class="container">
        <h2 class="title">M shop Orders list</h2>
        <div class="card accordion title_flex">
            <div class="acc_flex">
                <div class="acc_title">Customer Name</div>
                {{-- <div class="acc_title">Order Date</div> --}}
                <div class="acc_title">Phone</div>
                <div class="acc_title">Address</div>
                <div class="acc_title">Action</div>
            </div>
        </div>
        @foreach ($order_users as $users)
            <div class="card accordion">
                <div class="acc_flex acc_data">
                    <i class="bx bx-down-arrow-alt acc_toggle"></i>
                    <div class="">{{ $users->name }}</div>
                    <div><span>{{ $users->phone }}</span></div>
                    <div>
                        <span>{{$users->address}}
                        </span>
                    </div>
                    <div>
                        <button class="btn primary_btn">Pending</button>
                        <button class="btn danger_btn">
                            Reject
                        </button>
                    </div>
                </div>
                <div class="acc_panel">
                    <div class="item">
                        <span>Brand Name: Huawei</span><br />
                        <span>Model : Y7P</span><br />
                        <span>Specifications: Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Ex, nemo culpa
                            dolorem exercitationem velit debitis iure
                            ipsam, dolor consequatur nam cum aspernatur?
                            Inventore, autem unde repellendus voluptatum
                            perferendis ab cum.</span>
                    </div>
                    <div class="item">
                        <span>Brand Name: Huawei</span><br />
                        <span>Model : Y7P</span><br />
                        <span>Specifications: Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Ex, nemo culpa
                            dolorem exercitationem velit debitis iure
                            ipsam, dolor consequatur nam cum aspernatur?
                            Inventore, autem unde repellendus voluptatum
                            perferendis ab cum.</span>
                    </div>
                </div>
                
                
            </div>
        @endforeach
        
    </div>
    <script>
        //accordion toggle 
        const acc_toggle = document.getElementsByClassName('acc_toggle');
        const panel = document.getElementsByClassName('acc_panel');

        for (let i = 0; i < acc_toggle.length; i++) {
            acc_toggle[i].addEventListener('click', () => {
                panel[i].style.display = panel[i].style.display === 'block' ? 'none' : 'block';

            });
        }
    </script>
@endsection
