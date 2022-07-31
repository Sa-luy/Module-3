<div class="featured__item__pic set-bg"
                                data-setbg="{{ asset('storage/images/' . $product->image) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="bx bx-heart"></i></a></li>
                                    <li><a href="#"><i class='bx bx-message-rounded-edit'></i></a></li>
                                    <li><a href="#" data-url="{{ route('addToCart', $product->id) }}"
                                            class="addCart"><i class='bx bx-cart-alt'></i></a></li>
                                </ul>
                            </div>
