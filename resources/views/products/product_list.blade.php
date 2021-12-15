@extends('dashboard.home')
@section('title', 'Product List')
@section('content')
    <div class="container">
        <h2 class="title">M shop Item list</h2>
        <div class="search_form">
            <input type="text" name="search" id="search" placeholder="Search with product name,eg: Iphone"
                class="search_control">
        </div>
        <div class="add_btn">
            <a href="{{ route('new#product') }}" class="btn primary_btn">New Product</a>
        </div>
        <div id="all_products">
            @include('products.product_pagination')

        </div>

        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    </div>

    <script>
        $(document).ready(function() {

            var query = $('#search').val();

            var page = $('#hidden_page').val();
            fetch_data(page, query)

            function fetch_data(page, query) {
                $.ajax({
                    url: "search?page=" + page + "&query=" + query,
                    method: 'GET',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        $('#all_products').html('');

                        $('#all_products').html(data);

                    }
                })
            }

            $(document).on('keyup', '#search', function() {
                var query = $('#search').val();

                var page = $('#hidden_page').val();
                fetch_data(page, query);
            });



            $(document).on('click', '.custom_pager a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);


                var query = $('#search').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, query);
                // console.log(query)
            });

        });
    </script>
@endsection
