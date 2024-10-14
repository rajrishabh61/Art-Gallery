<?php $this->view("header",$data); ?> 
   <!------{{MAIN CONTAINER}}-------->
    <div class="container-fluid m-0 p-0">
        <div class="row _rgztCEl1dE">
            <div class="_dSXRBYL98w">
                <img src="<?= ASSETS ?>image/neom-rVC6O_gDE0Q-unsplash.jpg" alt="">
                <div class="_heidOQ80NM">
                    <h2>FAQ</h2>
                    <h6>Find Answers to Your Queries</h6>
                </div>
            </div>
            <div class="_mZvcDgQs6u">
                <h3>Frequently Asked Questions</h3>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            How do I create an account?
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            To create an account, simply click on the "Sign Up" or "Register" button on our homepage. Fill in the required information, including your name, email address, and a secure password. Once you've completed the registration process, you can start exploring and using our platform.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            How do I search for content?
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            To search for content, you can use the search bar located at the top of our website. Enter relevant keywords, such as specific topics, styles, or keywords, and click on the search button. You can also use filters to refine your search results based on categories, orientation, color, and more.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            How do I download content?
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Once you've found the content you'd like to download, click on the image or video to open the detailed view. Depending on the licensing options, you can choose the appropriate license type (e.g., personal, commercial) and the desired file size or resolution. Add the content to your cart and proceed to the checkout process. After completing the purchase, you can download the content directly to your device.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
                            What are the licensing options available for the content?
                          </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                            We offer various licensing options to cater to different needs. The specific licensing terms are mentioned for each piece of content and may include personal use, commercial use, editorial use, and exclusive licenses. Make sure to review the license details for each piece of content before making a purchase to ensure compliance with your intended usage.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseThree">
                            What forms of payment do you accept?
                          </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                            We accept various forms of payment, including major credit cards, debit cards, and popular online payment platforms. During the checkout process, you'll have the option to select your preferred payment method.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseThree">
                            Can I contribute my own content to ArtGallery?
                          </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                            Yes, we welcome content creators to join our platform and contribute their work. To become a contributor, navigate to the "Contributor" or "Submit Content" section on our website and follow the guidelines for submitting your content. Our team will review your submission, and if accepted, your work will be showcased on our platform.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseThree">
                            What are the terms and conditions for content usage?
                          </button>
                        </h2>
                        <div id="flush-collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                            The terms and conditions for content usage are specified in the licensing agreement associated with each piece of content. It is important to carefully review the license terms to understand the permitted usage, restrictions, and any additional requirements for using the content.
                          </div>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
    </div>
    <?php $this->view("footer",$data); ?>
<?php include 'modal.php'; ?>   