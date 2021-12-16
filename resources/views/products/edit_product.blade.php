@extends('dashboard.home')
@section('title', 'Update Product')

@section('content')
    <div class="container">
        <div class="card add_card">
            <h2 class="title">Update Item</h2>
            @if ($success = session()->get('success'))
                <div class="message success">
                    <span class="success_text">{{ $success }}</span>
                </div>
            @endif
            <form action="{{ route('update#product', $product->p_id) }}" method="POST" id="product_form" enctype="multipart/form-data">
                @csrf
                <div class="form_row">
                    <!-- first col -->
                    <div class="form_col">
                        <div class="form_field">
                            <div class="label">
                                <label for="name">Item Name</label>
                            </div>

                            <div class="form_input">
                                <input type="text" name="name" id="name" class="form_control"
                                    placeholder="Enter your item name" value="{{ old('name', $product->p_name) }}"/>
                            </div>
                            @error('name')
                                <div class="error">
                                    <span class="error_text">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="form_field">
                            <div class="label">
                                <label for="brands">Brands Name</label>
                            </div>
                            <div class="form_input">
                                <select name="brand_name" id="" class="form_option">
                                    <option value="" selected disabled>--select--</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->b_id }}" {{ $product->b_id == $brand->b_id ? 'selected' : ''}}>{{ $brand->b_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('brand_name')
                                <div class="error">
                                    <span class="error_text">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form_field">
                            <div class="label">
                                <label for="brands">Product Photo</label>
                            </div>
                            <div class="form_input">
                                <input type="file" name="image" id="product_img" accept="image/*">
                                <span class="btn primary_btn"
                                    onclick="document.getElementById('product_img').click()">Upload Image</span>
                            </div>
                            {{-- @error('image')
                                <br>
                                <div class="error">
                                    <span class="error_text" id="">{{ $message }}</span>
                                </div>
                            @enderror --}}
                            
                        </div>
                        <div class="form_field">
                            <div class="form_img" id="preview_container">
                                <img src="{{ asset('images/'.$product->p_image) }}" alt="Product Image" id="product_img_preview">
                            </div>
                        </div>
                    </div>

                    <!-- second col -->
                    <div class="form_col">
                        <div class="form_field">
                            <div class="label">
                                <label for="price">Price</label>
                            </div>
                            <div class="form_input">
                                <input type="number" name="price" id="price" class="form_control"
                                    placeholder="Enter your item price" value="{{ old('price',$product->price) }}"/>
                            </div>
                            @error('price')
                                <div class="error">
                                    <span class="error_text">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form_field">
                            <div class="label">
                                <label for="qty">Available Quantity</label>
                            </div>
                            <div class="form_input">
                                <input type="number" name="qty" id="qty" class="form_control"
                                    placeholder="Enter your available qty" value="{{ old('qty', $product->qty) }}"/>
                            </div>
                            @error('qty')
                                <div class="error">
                                    <span class="error_text">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form_field">
                            <div class="label">
                                <label for="name">Instock/Preorder</label>
                            </div>
                            <div class="form_input">
                                <input type="radio" name="stock" id="stock" class="form_radio" value="1" {{ $product->stock == '1' ? 'checked': ''}}/>
                                InStock &nbsp;
                                <input type="radio" name="stock" id="stock" class="form_radio" value="0" {{ $product->stock == '0' ? 'checked': ''}}/>
                                PreOrder
                            </div>
                            @error('stock')
                                <div class="error">
                                    <span class="error_text">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form_field">
                            <div class="label">
                                <label for="spec">Item Specifications</label>
                            </div>
                            <div class="form_input">
                                <textarea name="specs" class="form_control" id="" cols="30" rows="10">{{ old('specs', $product->specs) }}</textarea>
                            </div>
                            @error('specs')
                                <div class="error">
                                    <span class="error_text">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form_btn">
                    <button type="submit" class="btn primary_btn" id="save_product">
                        Save
                    </button>
                    <button class="btn secondary_btn" id="cancel">
                        Cancel
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        $(document).ready(() => {
            if($('#product_img_preview').src !== ''){
                preview_container.style.display = 'block';
            }
        });

        $('#cancel').click((e) => {
            e.preventDefault();
            window.location.href = `{{ route('product#list') }}`;
        });
    </script>

@endsection
