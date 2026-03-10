<!-- breadcrumb area start -->
<section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
    <div class="rs-breadcrumb-bg" style="background: #424242;"></div>

    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-8 col-lg-8">

                <div class="rs-breadcrumb-content-wrapper">

                    <div class="rs-breadcrumb-title-wrapper">
                        <h1 class="rs-breadcrumb-title">Wishlist</h1>
                    </div>

                    <div class="rs-breadcrumb-menu">
                        <nav>
                            <ul>
                                <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                <li><span>Wishlist</span></li>
                            </ul>
                        </nav>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->



<section class="rs-cart-area section-space">
    <div class="container">

        <div class="shop-table-content table-responsive">

            <table class="table wishlist-table">

                <thead>
                    <tr>
                        <th>Images</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Remove</th>
                    </tr>
                </thead>

                <tbody id="wishlistTableBody"></tbody>

            </table>
            <div class="modal fade" id="enquiryModal" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Enquiry Now</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="row">

                           <div class="row align-items-center">

    <div class="col-md-6 text-center d-none d-md-block">
        @if ($logo = theme_option('logo'))
            <a href="{{ BaseHelper::getHomepageUrl() }}">
                <img src="{{ RvMedia::getImageUrl($logo) }}" 
                     loading="lazy"
                     class="img-fluid mx-auto d-block"
                     alt="{{ theme_option('site_title') }}">
            </a>
        @endif
    </div>

    <div class="col-md-6">

        <form>

            <div class="mb-3">
                <input type="text" class="rs-contact-input" placeholder="First Name">
            </div>

            <div class="mb-3">
                <input type="email" class="rs-contact-input" placeholder="E-Mail Address">
            </div>

            <div class="mb-3">
                <input type="text" class="rs-contact-input" placeholder="Your Phone">
            </div>

            <div class="mb-3">
                <input type="text" class="rs-contact-input" placeholder="Location">
            </div>

            <div class="mb-3">
         <textarea class="rs-contact-input" rows="3" placeholder="Message"></textarea>
            </div>

            <div>
                <button class="rs-btn has-theme-light-green has-icon has-bg">
                    Submit
                </button>
            </div>

        </form>

    </div>

</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="rs-header-btn">
                <a class="rs-btn has-theme-light-green has-icon has-bg" href="#" data-bs-toggle="modal"
                    data-bs-target="#enquiryModal">
                    Enquiry Now
                    <span class="icon-box">
                        <svg class="icon-first" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path
                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                            </path>
                        </svg>
                    </span>
                </a>
            </div>
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

        let table = document.getElementById("wishlistTableBody");


        if (wishlist.length == 0) {

            table.innerHTML = `
<tr>
<td colspan="4" style="text-align:center;">Wishlist is empty</td>
</tr>
`;

            return;

        }


        wishlist.forEach((item, index) => {

            let qty = item.qty ? item.qty : 1;

            table.innerHTML += `

<tr>

<td class="product-thumbnail">
<a href="${item.url}">
<img src="${item.image}">
</a>
</td>

<td class="product-name">
<a href="${item.url}">${item.name}</a>
</td>

<td>

<div class="qty-box">

<button class="minus" data-index="${index}">-</button>

<input type="text" id="qty-${index}" value="${qty}" class="qty-input">

<button class="plus" data-index="${index}">+</button>

</div>

</td>

<td>

<button class="removeRow" data-index="${index}">
<i class="fa fa-times"></i> Remove
</button>

</td>

</tr>

`;

        });



        /* PLUS BUTTON */

        document.querySelectorAll(".plus").forEach(btn => {

            btn.addEventListener("click", function() {

                let index = this.dataset.index;

                let input = document.getElementById("qty-" + index);

                let value = parseInt(input.value);

                value++;

                input.value = value;

                wishlist[index].qty = value;

                localStorage.setItem("wishlist", JSON.stringify(wishlist));

            });

        });


        /* MINUS BUTTON */

        document.querySelectorAll(".minus").forEach(btn => {

            btn.addEventListener("click", function() {

                let index = this.dataset.index;

                let input = document.getElementById("qty-" + index);

                let value = parseInt(input.value);

                if (value > 1) {

                    value--;

                    input.value = value;

                    wishlist[index].qty = value;

                    localStorage.setItem("wishlist", JSON.stringify(wishlist));

                }

            });

        });


        /* REMOVE PRODUCT */

        document.querySelectorAll(".removeRow").forEach(btn => {

            btn.addEventListener("click", function() {

                let index = this.dataset.index;

                wishlist.splice(index, 1);

                localStorage.setItem("wishlist", JSON.stringify(wishlist));

                location.reload();

            });

        });


    });
</script>




<style>
    table tr {
        border: 1px solid #000;
    }

    tr:first-child td {
        background-color: #fff;
    }

    /* TABLE DESIGN */
    input[type=text],
    input[type=email],
    input[type=tel],
    input[type=number],
    input[type=password],
    textarea {
        width: auto;
    }

    .wishlist-table {
        width: 100%;
        /* border: 1px solid #0b5fa5; */
        border-collapse: collapse;
    }

    .wishlist-table thead th {
        text-align: center;
        /* border: 1px solid #0b5fa5; */
        padding: 15px;
        font-weight: 600;
    }

    .wishlist-table tbody td {
        text-align: center;
        /* border: 1px solid #0b5fa5; */
        padding: 35px 15px;
        vertical-align: middle;
    }


    /* PRODUCT IMAGE */

    .product-thumbnail img {
        width: 120px;
        height: auto;
    }


    /* PRODUCT NAME */

    .product-name a {
        color: #000;
        font-size: 16px;
        text-decoration: none;
    }


    /* QUANTITY */

    .qty-box {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .qty-box button {
        width: 30px;
        height: 30px;
        border: none;
        background: transparent;
        font-size: 20px;
        cursor: pointer;
    }

    .qty-input {
        width: 40px;
        height: 40px;
        border: 2px solid #000;
        text-align: center;
        font-size: 16px;
    }


    /* REMOVE BUTTON */

    .removeRow {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .removeRow i {
        margin-right: 5px;
    }

    .removeRow:hover {
        color: red;
    }
</style>
