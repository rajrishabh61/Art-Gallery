<?php $this->view("header",$data); ?>   
   <!------{{MAIN CONTAINER}}-------->
    <div class="container-fluid m-0 p-0">
        <div class="row _UlVA7NRuzk">
            <div class="_rsCepjuFul">
                <h2>Contact US</h2>
                <h6>Hi! <?php echo (isset($data['user_data'])) ? $data['user_data']->fullname : ''; ?>, In what manner can we offer our assistance to you?</h6>
                <div class="_contactContainer">
                    <div class="_4t0scxy">
                        <label for="inputName3">Name</label>
                        <input type="text" class="cntinputName3" id="inputName3" aria-describedby="nameHelp3" placeholder="Enter full name">
                        <small id="nameHelp3" class="inputMsg"></small>
                    </div>
                    <div class="_4t0scxy">
                        <label for="inputEmail3">Email</label>
                        <input type="email" class="cntinputEmail3" id="inputEmail3" aria-describedby="emailHelp3" placeholder="Enter email">
                        <small id="emailHelp3" class="inputMsg"></small>
                    </div>
                    <div class="_4t0scxy">
                        <label for="inputReason3">Reason</label>
                        <input type="email" class="cntinputReason3" id="inputReason3" aria-describedby="reasonHelp3" placeholder="Enter reason">
                        <small id="reasonHelp3" class="inputMsg"></small>
                    </div>
                    <div class="_4t0scxy">
                        <label for="textareaDetails3">Details</label>
                        <textarea name="textareaDetails3" id="textareaDetails3" aria-describedby="detailsHelp3" cols="30" rows="10" placeholder="Please describe your question or issue you’re experiencing in as much detail as possible. Do not include any private information, such as your password or phone number, in this request."></textarea>
                        <small id="detailsHelp3" class="inputMsg"></small>
                    </div>
                    <div class="_4t0scxy">
                        <button type="button" class="reqstSent" id="reqstSent">Submit Request</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->view("footer",$data); ?>
<?php include 'modal.php'; ?>