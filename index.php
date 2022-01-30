<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Water</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/mainStyle.css">
</head>

<body>

    <section id="upSection">
        <div id="bubleSection" class="container">
            <div class="row">
                <div class="col-12 title mb-5">
                    <h1 class="txt mb-5 mt-5">Purchase Water</h1>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div id="card1" class="col-12 col-md-4 mr-3 btl_card btl_card1">
                    <img class="img-fluid centerImg btl6" src="./img/6bttls.png" alt="6bottles">
                    <p class="txt mainText mt-2">6 BOTTLE PACK</p>
                    <p class="txt price">$2.5 / pack</p>
                    <div class="btn_inp">
                        <button type-action="add" price="2.5" product-type='6' class="add ml-1 mr-1"
                            title="6 bottle pack">+</button>
                        <input class="inputQuantety" quantety="0" class="quantity1" type="text" readonly=""
                            placeholder="0">
                        <button type-action="decrease" product-type='6' price="2.5"
                            class="remove ml-1 mr-1">-</button>
                    </div>
                </div>
                <div id="card2" class="col-12 col-md-4 mr-3 btl_card btl_card2 ">
                    <img class="img-fluid centerImg btl12" src="./img/12bttls.png" alt="12bottles">
                    <p class="txt mainText mt-2">12 BOTTLE PACK</p>
                    <p class="txt price">$4.6 / pack</p>
                    <div class="btn_inp">
                        <button type-action="add" product-type='12' price='4.6' class="add ml-1 mr-1"
                            title="12 bottle pack">+</button>
                        <input class="inputQuantety" quantety="0" class="quantity2" type="text" readonly=""
                            placeholder="0">
                        <button type-action="decrease" product-type='12' price="4.6"
                            class="remove ml-1 mr-1">-</button>
                    </div>

                </div>
                <div id="card3" class="col-12 col-md-4 btl_card btl_card3 ">
                    <img class="img-fluid centerImg btl24" src="./img/24btls.png" alt="24bottles">
                    <p class="txt mainText mt-2">24 BOTTLE PACK</p>
                    <p class="txt price">$9 / pack</p>
                    <div class="btn_inp ">
                        <button type-action="add" product-type='24' price='9' class="add ml-1 mr-1"
                            title="24 bottle pack">+</button>
                        <input class="inputQuantety" quantety="0" class="quantity3" type="text" readonly=""
                            placeholder="0">
                        <button type-action="decrease" product-type='24' price="9" class="remove ml-1 mr-1">-</button>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section id='billingSection'>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <img class="img-fluid" src="./img/girl_img.png" alt="girl with bottle">
                </div>

                <div class="col-12 col-md-5">
                    <h3 class="col-12 p-0">Billing Info</h3>
                    <form id="mainForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="row">
                            <div class="col-5 col-md-4" id="biling_cart">

                            </div>

                            <div id="billPackText" class="col-5 col-md-4">

                            </div>

                            <div id=packsQuantenty class="col-2 col-md-4">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <span id="totalText">Your total :</span>
                            </div>

                            <div class="col-md-6">
                                <span id="total"></span>
                            </div>
                        </div>
                        <div class="col align-self-center">
                            <button type="submit" id="checkout" class="btn btn-primary">Checkout</button>
                            <p id=errorMsg class="mt-3 mr-3"></p>
                        </div>

                    </form>
                </div>
                <div class="col-12 col-md-2">

                </div>

            </div>
        </div>
    </section>


    <!-- The Modal  -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div id="modal-content" class="modal-content">
            <span class="close">&times;</span>

        </div>
    </div>
    <footer>

    </footer>

    <script src="./js/mainScript.js" defer></script>
</body>

</html>
