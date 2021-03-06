<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Site Setting</h3>
            </div>
            <?php echo form_open('admin/setting'); ?>
            <div class="box-body">

                <?php echo validation_errors(); ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="site_title" class="control-label">Site Title</label>
                    <div class="form-group">
                        <input type="text" name="site_title"
                               value="<?php echo($this->input->post('site_title') ? $this->input->post('site_title') : $setting['site_title']); ?>"
                               class="form-control" id="site_title" required/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="site_keyword" class="control-label">Site Keyword</label>
                    <div class="form-group">
                        <input type="text" name="site_keyword"
                               value="<?php echo($this->input->post('site_keyword') ? $this->input->post('site_keyword') : $setting['site_keyword']); ?>"
                               class="form-control" id="site_keyword" required/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="site_description" class="control-label">Site Description</label>
                    <div class="form-group">
                        <input type="text" name="site_description"
                               value="<?php echo($this->input->post('site_description') ? $this->input->post('site_description') : $setting['site_description']); ?>"
                               class="form-control" id="site_description" required/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="site_description" class="control-label">Email for contact</label>
                    <div class="form-group">
                        <input type="text" name="email_for_contact"
                               value="<?php echo($this->input->post('email_for_contact') ? $this->input->post('email_for_contact') : $setting['email_for_contact']); ?>"
                               class="form-control" id="email_for_contact" required/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="phone_for_contact" class="control-label">Phone for contact</label>
                    <div class="form-group">
                        <input type="text" name="phone_for_contact"
                               value="<?php echo($this->input->post('phone_for_contact') ? $this->input->post('phone_for_contact') : $setting['phone']); ?>"
                               class="form-control" id="phone_for_contact" required/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="email_for_order" class="control-label">Email for Order system</label>
                    <div class="form-group">
                        <input type="text" name="email_for_order"
                               value="<?php echo($this->input->post('email_for_order') ? $this->input->post('email_for_order') : $setting['email_for_order']); ?>"
                               class="form-control" id="email_for_order" required/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="email_for_member" class="control-label">Email for member system</label>
                    <div class="form-group">
                        <input type="text" name="email_for_member"
                               value="<?php echo($this->input->post('email_for_member') ? $this->input->post('email_for_member') : $setting['email_for_member']); ?>"
                               class="form-control" id="email_for_member" required/>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="facebook" class="control-label">Facebook</label>
                    <div class="form-group">
                        <input type="text" name="facebook"
                               value="<?php echo($this->input->post('facebook') ? $this->input->post('facebook') : $setting['facebook']); ?>"
                               class="form-control" id="facebook" required/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="google" class="control-label">Google</label>
                    <div class="form-group">
                        <input type="text" name="google"
                               value="<?php echo($this->input->post('google') ? $this->input->post('google') : $setting['google_plus']); ?>"
                               class="form-control" id="google" required/>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="instagram" class="control-label">Instagram</label>
                    <div class="form-group">
                        <input type="text" name="instagram"
                               value="<?php echo($this->input->post('instagram') ? $this->input->post('instagram') : $setting['instagram']); ?>"
                               class="form-control" id="instagram" required/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix"></div>
                <h4>Shipping setting</h4>
                <div class="clearfix"></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="instagram" class="control-label">In area Zip code</label>
                    <div class="form-group">
                        <textarea rows="4" name="shipping_zip"
                                  class="form-control"><?php echo($this->input->post('shipping_zip') ? $this->input->post('shipping_zip') : $setting['shipping_zip']); ?></textarea>
                    </div>
                    <label for="instagram" class="control-label">In area amount</label>
                    <div class="form-group">
                        <input type="text" name="shipping_inarea"
                               value="<?php echo($this->input->post('shipping_inarea') ? $this->input->post('shipping_inarea') : $setting['shipping_inarea']); ?>"
                               class="form-control digi" id="instagram" required/>
                    </div>
                    <label for="instagram" class="control-label">Out of area amount</label>
                    <div class="form-group">
                        <input type="text" name="shipping_outarea"
                               value="<?php echo($this->input->post('shipping_outarea') ? $this->input->post('shipping_outarea') : $setting['shipping_outarea']); ?>"
                               class="form-control digi" id="shipping_outarea" required/>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save Setting
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>