<section id="checkout-page">
    <div class="container">
        <div class="col-xs-10">
            
            <div class="billing-address">
                <h2 class="border h1">direccion de facturacion</h2>
                <form>
                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            <label>nombre completo*</label>
                            <input class="le-input" >
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>apellidos*</label>
                            <input class="le-input" >
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12">
                            <label>compañia</label>
                            <input class="le-input" >
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            <label>direccion*</label>
                            <input class="le-input" data-placeholder="calle, avenida..." >
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>&nbsp;</label>
                            <input class="le-input" data-placeholder="ciudad" >
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-4">
                            <label>codigo postal*</label>
                            <input class="le-input"  >
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <label>email*</label>
                            <input class="le-input" >
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <label>telefono*</label>
                            <input class="le-input" >
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div id="create-account" class="col-xs-12">
                            <input  class="le-checkbox big" type="checkbox"  />
                            <a class="simple-link bold" href="index.php?page=registro">Crear una cuenta?</a>
                        </div>
                    </div><!-- /.field-row -->

                </form>
            </div><!-- /.billing-address -->


            <section id="shipping-address">
                <h2 class="border h1">direccion de envio</h2>
                <form>
                    <div class="row field-row">
                        <div class="col-xs-12">
                            <input  class="le-checkbox big" type="checkbox"  />
                            <a class="simple-link bold" href="#">enviar a otra direccion?</a>
                        </div>
                    </div><!-- /.field-row -->
                </form>
            </section><!-- /#shipping-address -->


            <section id="your-order">
                <h2 class="border h1">tu pedido</h2>
                <form>
                    <div class="row no-margin order-item">
                        <div class="col-xs-12 col-sm-1 no-margin">
                            <a href="#" class="qty">1 x</a>
                        </div>

                        <div class="col-xs-12 col-sm-9 ">
                            <div class="title"><a href="#">Mango </a></div>
                            <div class="brand">importado</div>
                        </div>

                        <div class="col-xs-12 col-sm-2 no-margin">
                            <div class="price">4.99€</div>
                        </div>
                    </div><!-- /.order-item -->

                    <div class="row no-margin order-item">
                        <div class="col-xs-12 col-sm-1 no-margin">
                            <a href="#" class="qty">1 x</a>
                        </div>

                        <div class="col-xs-12 col-sm-9 ">
                            <div class="title"><a href="#">calabaza </a></div>
                            <div class="brand">salamanca</div>
                        </div>

                        <div class="col-xs-12 col-sm-2 no-margin">
                            <div class="price">1.23€</div>
                        </div>
                    </div><!-- /.order-item -->

                    <div class="row no-margin order-item">
                        <div class="col-xs-12 col-sm-1 no-margin">
                            <a href="#" class="qty">1 x</a>
                        </div>

                        <div class="col-xs-12 col-sm-9 ">
                            <div class="title"><a href="#">pistachos </a></div>
                            <div class="brand">caceres</div>
                        </div>

                        <div class="col-xs-12 col-sm-2 no-margin">
                            <div class="price">3.56€</div>
                        </div>
                    </div><!-- /.order-item -->
                </form>
            </section><!-- /#your-order -->

            <div id="total-area" class="row no-margin">
                <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                    <div id="subtotal-holder">
                        <ul class="tabled-data inverse-bold no-border">
                            <li>
                                <label>total carrito</label>
                                <div class="value ">$8434.00</div>
                            </li>
                            <li>
                                <label>envio</label>
                                <div class="value">
                                    <div class="radio-group">
                                        <input class="le-radio" type="radio" name="group1" value="free"> <div class="radio-label bold">envio gratis</div><br>
                                        <input class="le-radio" type="radio" name="group1" value="local" checked>  <div class="radio-label">correos<br><span class="bold">15€</span></div>
                                    </div>
                                </div>
                            </li>
                        </ul><!-- /.tabled-data -->

                        <ul id="total-field" class="tabled-data inverse-bold ">
                            <li>
                                <label>total pedido</label>
                                <div class="value">1000€</div>
                            </li>
                        </ul><!-- /.tabled-data -->

                    </div><!-- /#subtotal-holder -->
                </div><!-- /.col -->
            </div><!-- /#total-area -->

            <div id="payment-method-options">
                <form>
                    <div class="payment-method-option">
                        <input class="le-radio" type="radio" name="group2" value="Direct">
                        <div class="radio-label bold ">transferencia bancaria</div>
                    </div><!-- /.payment-method-option -->
                    
                    <div class="payment-method-option">
                        <input class="le-radio" type="radio" name="group2" value="cheque">
                        <div class="radio-label bold ">cheque</div>
                    </div><!-- /.payment-method-option -->
                    
                    <div class="payment-method-option">
                        <input class="le-radio" type="radio" name="group2" value="paypal">
                        <div class="radio-label bold ">paypal</div>
                    </div><!-- /.payment-method-option -->
                </form>
            </div><!-- /#payment-method-options -->
            
            <div class="place-order-button">
                <button class="le-button big">realizar pedido</button>
            </div><!-- /.place-order-button -->

        </div><!-- /.col -->
    </div><!-- /.container -->    
</section><!-- /#checkout-page -->