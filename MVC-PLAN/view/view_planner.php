<main id="main" role="main">
    <section class="contact-area pt_60 pb_90">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="contact-item flex">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <h4><?php echo ADDRESS; ?></h4>
                            <p>
                                <?php echo nl2br($page_contact['contact_address']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact-item flex">
                        <div class="contact-icon">
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <h4><?php echo PHONE_NUMBER; ?></h4>
                            <p>
                                <?php echo nl2br($page_contact['contact_phone']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact-item flex">
                        <div class="contact-icon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <h4><?php echo EMAIL_ADDRESS; ?></h4>
                            <p>
                                <?php echo nl2br($page_contact['contact_email']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="contact-form headstyle pt_90">
                        <h4><?php echo PROJECT_FORM; ?></h4>
                        <?php echo form_open(base_url() . 'contact/send_planner', array('class' => '')); ?>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="" class="sr-only"><?php echo NAME; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo NAME; ?>" name="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="sr-only"><?php echo EMAIL_ADDRESS; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo EMAIL_ADDRESS; ?>"
                                    name="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="sr-only"><?php echo PHONE_NUMBER; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo PHONE_NUMBER; ?>"
                                    name="phone">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="" class="sr-only"><?php echo CITY; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo CITY; ?>"
                                    name="city">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="sr-only"><?php echo ADDRESS; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo ADDRESS; ?>"
                                    name="address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="sr-only"><?php echo POSTCODE; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo POSTCODE; ?>"
                                    name="postcode">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="" class="sr-only"><?php echo SERVICE; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo SERVICE; ?>"
                                    name="service">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="" class="sr-only"><?php echo COMPANY; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo COMPANY; ?>"
                                    name="company">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="sr-only"><?php echo BUDGETS; ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo BUDGETS; ?>"
                                    name="budgets">
                            </div>


                            <div class="form-group col-12">
                                <label for="" class="sr-only"><?php echo PRESENTATION; ?></label>
                                <textarea class="form-control" placeholder="<?php echo PRESENTATION; ?>"
                                    name="presentation"></textarea>
                            </div>
                            <div class="form-group col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">
                                        Elolvastam és egyetértek az
                                        <a style="text-decoration: underline;"
                                            href="<?php echo base_url(); ?>informacio/adatkezelesi-tajekoztato">adatkezelési
                                            szabályzattal</a>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="sec"><?php echo $this->cifence->placeholder; ?><span
                                            class="asterisk">*</span></label><br />
                                    <input type="text" name="captcha" value=""
                                        placeholder="Add meg a helyes választ..." /><br />
                                    <?php echo form_error('captcha', '<span class="alert">', '</span>'); ?>
                                </div>

                            </div>

                            <div class="form-group col-12">
                                <button type="submit" class="btn"
                                    name="form_contact"><?php echo SEND_MESSAGE; ?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->

    <!-- Map Start -->
    <div class="map-area">
        <?php echo $page_contact['contact_map']; ?>
    </div>
    <!-- Map End -->

</main>