<?php $this->load->view("_partials/header")?>
    
    <form action="<?= base_url()?>soal/add_jawaban_ielts" method="post" id="formIelts">
        <div class="page page-center" id="login">
            <div class="container-tight py-4">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="text-center mt-4 mb-4">
                            <a href="javascript:void()"><img src="<?= base_url()?>/assets/img/topenglish.png" height="80" alt=""></a>
                        </div> -->
                        <?php if( $this->session->flashdata('pesan') ) : ?>
                            <div class="text-center mb-4">
                                <a href="javascript:void()"><img src="<?= base_url().'/assets/img/topenglish.png'?>" height="80" alt=""></a>
                            </div>
                            <?= $this->session->flashdata('pesan')?>
                        <?php else: ?>
                            <img src="<?= base_url()?>assets/img/poster.jpeg" alt="">
                            <div class="mb-2 mt-3">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="first_name" class="form form-control required">
                                            <label for="">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="last_name" class="form form-control required">
                                            <label for="">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" class="form form-control required">
                                    <label for="">Email</label>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="button" class="btn btn-primary w-100 btnTransisiSatu">Start</button>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>

        <div class="page page-center" id="transisi-sesi-1" style="display:none">
            <div class="container-tight py-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <a href="javascript:void()"><img src="<?= base_url().'/assets/img/topenglish.png'?>" height="80" alt=""></a>
                        </div>
                        <center>
                            <p><b>First Session : LISTENING</b></p>
                            <p><i>Time : 40 Minutes</i></p>
                        </center>
                        <div class="form-footer">
                            <button type="button" class="btn btn-primary w-100 btnListening" >Start</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page page-center" id="transisi-sesi-2" style="display:none">
            <div class="container-tight py-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <a href="javascript:void()"><img src="<?= base_url().'/assets/img/topenglish.png'?>" height="80" alt=""></a>
                        </div>
                        <center>
                            <p><b>Second Session : READING</b></p>
                            <p><i>Time : 60 Minutes</i></p>
                        </center>
                        <div class="form-footer">
                            <button type="button" class="btn btn-primary w-100 btnReading">Start</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page page-center" id="transisi-sesi-3" style="display:none">
            <div class="container-tight py-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <a href="javascript:void()"><img src="<?= base_url().'/assets/img/topenglish.png'?>" height="80" alt=""></a>
                        </div>
                        <center>
                            <p><b>Third Session : WRITING</b></p>
                            <p><i>Time : 60 Minutes</i></p>
                        </center>
                        <div class="form-footer">
                            <button type="button" class="btn btn-primary w-100 btnWriting">Start</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="soal_tes" style="display:none">
            <div class="wrapper" id="elementtoScrollToID">
                <div class="sticky-top">
                    <?php $this->load->view("_partials/navbar-header")?>
                </div>
                <div class="page-wrapper" id="">
                    <div class="page-body">
                        <div class="container-xl">
                            <input type="hidden" name="id_tes" value="<?= $id?>">

                            <div class="sesi-listening" style="display:none">
                                <div class="shadow card mb-3">
                                    <div class="card-body">
                                        <center>
                                            <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('assets/myaudio/listening-academic-general-pretest.mp3?t='.time())?>" type="audio/mpeg"></audio>
                                            <progress id="seekbar-1" value="0" max="1" style="width:100%;"></progress><br>
                                            <button class="btn btn-success btnAudio" data-id="1" type="button"><?= tablerIcon("player-play", "")?> play</button>
                                            <p><small class="text-danger"><i>note : The audio can only be played once</i></small></p>
                                        </center>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST GENERAL</b></center>
                                        <p class="question">
                                            SECTION 1 | Questions 1-10<br>
                                            Questions 1-10<br>
                                            Complete the table below.<br>
                                            Write NO MORE THAN TWO WORDS AND/OR A NUMBER for each answer.
                                        </p>

                                        <center><span><h3>Details of Claim Form</h3></span></center>
                                        <center>
                                            <table class="table" style="width:100%">
                                                <tr>
                                                    <td>Claiman’ts Address:</td>
                                                    <td>No.1 Yeronga St., <b>1)</b><?= soal_isian_ielts("jawaban_listening[0]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Telephone Number:</td>
                                                    <td><b>2)</b><?= soal_isian_ielts("jawaban_listening[1]")?> (home)</td>
                                                </tr>
                                                <tr>
                                                    <td>Respondent:</td>
                                                    <td><b>3)</b><?= soal_isian_ielts("jawaban_listening[2]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Address:</td>
                                                    <td><b>4)</b><?= soal_isian_ielts("jawaban_listening[3]")?> Avenue, Bardon </td>
                                                </tr>
                                                <tr>
                                                    <td>Postcode:</td>
                                                    <td><b>5)</b><?= soal_isian_ielts("jawaban_listening[4]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Guarantee:</td>
                                                    <td><b>6)</b><?= soal_isian_ielts("jawaban_listening[5]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Details of Claim:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>(+) Goods:</td>
                                                    <td><b>7)</b><?= soal_isian_ielts("jawaban_listening[6]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>(+) Agreed to pay:</td>
                                                    <td><b>8)</b><?= soal_isian_ielts("jawaban_listening[7]")?> pounds</td>
                                                </tr>
                                                <tr>
                                                    <td>(+) Advantages</td>
                                                    <td>Reduces the amount of <b>9)</b><?= soal_isian_ielts("jawaban_listening[8]")?> used</td>
                                                </tr>
                                                <tr>
                                                    <td>(+) Complaint</td>
                                                    <td>The appliance is very <b>10)</b><?= soal_isian_ielts("jawaban_listening[9]")?></td>
                                                </tr>

                                            </table>
                                        </center>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST GENERAL</b></center>
                                        <p class="question">
                                            SECTION 2 | Questions 11-20<br>
                                            Questions 11-14<br>
                                            Complete the sentences below.<br>
                                            Write NO MORE THAN TWO WORDS in each gap.
                                        </p>

                                        <p><b>11)</b> The coach is comfortable because it is <?= soal_isian_ielts("jawaban_listening[10]")?>.</p>
                                        <p><b>12)</b> After all passengers are aboard, the coach will make its first stop at <?= soal_isian_ielts("jawaban_listening[11]")?> island. </p>
                                        <p><b>13)</b> The ‘Tree Top Walk’ is above a/an <?= soal_isian_ielts("jawaban_listening[12]")?>.</p>
                                        <p><b>14)</b> Passengers will have a/an <?= soal_isian_ielts("jawaban_listening[13]")?> with the alpacas before boarding the bus for home. </p>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST GENERAL</b></center>
                                        <p class="question">
                                            Questions 15-20<br>
                                            Complete the table below.<br>
                                            Write NO MORE THAN TWO WORDS in each gap
                                        </p>

                                        <center><span><h3>Dreamtime Tours</h3></span></center>
                                        <center>
                                            <table class="table" style="width:100%">
                                                <tr>
                                                    <td colspan=2>Bookings at <b>15)</b> <?= soal_isian_ielts("jawaban_listening[14]")?> or Tel: 07 5562 4402</td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2><b>16)</b> <?= soal_isian_ielts("jawaban_listening[15]")?> Tour</td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2>Sunday, Monday, and Friday</td>
                                                </tr>
                                                <tr>
                                                    <td>Cost:</td>
                                                    <td>Full-day tour 280km departs:</td>
                                                </tr>
                                                <tr>
                                                    <td>Adult &emsp;&emsp; $37.00</td>
                                                    <td>-Coolangatta &emsp;&emsp; 7.50AM</td>
                                                </tr>
                                                <tr>
                                                    <td><b>17)</b> <?= soal_isian_ielts("jawaban_listening[16]")?>                       $33.00</td>
                                                    <td>-Burleigh &emsp;&emsp; 8.10AM</td>
                                                </tr>
                                                <tr>
                                                    <td>Children (4-14 years) &emsp;&emsp; $10.00</td>
                                                    <td>-Surfers Paradise      <b>18)</b> <?= soal_isian_ielts("jawaban_listening[17]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Family   (2 adult,2 children) &emsp; $94.00</td>
                                                    <td>-Labrador &emsp;&emsp; 8.45AM</td>
                                                </tr>
                                                <tr>
                                                    <td>Prices include</td>
                                                    <td><b>19)</b> <?= soal_isian_ielts("jawaban_listening[18]")?> only.</td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2>Free pick-up from your resort, hotel or motel.</td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2>Not included in the fare: optional tours, luncheons, morning and afternoon tea (unless otherwise specified), <b>20)</b> <?= soal_isian_ielts("jawaban_listening[19]")?>.</td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2>Meals and refreshments are available at all stops (at your own cost).</td>
                                                </tr>
                                            </table>
                                        </center>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST GENERAL</b></center>
                                        <p class="question">
                                            SECTION 3 | Questions 21-30<br>
                                            Questions 21-25 <br>
                                            Choose the correct letter A,B,or C
                                        </p>

                                        <?php
                                            $data_soal_21_25 = [
                                                [ 
                                                    "no" => 21, 
                                                    "soal" => "According to the liaison officer, volunteers help",
                                                    "pilihan" => [
                                                        "<b>A.</b> improve language program",
                                                        "<b>B.</b> provide quality education",
                                                        "<b>C.</b> staff members in education system",
                                                    ],
                                                    "name" => "jawaban_listening[20]"
                                                ],
                                                [ 
                                                    "no" => 22, 
                                                    "soal" => "Volunteers help students check and correct",
                                                    "pilihan" => [
                                                        "<b>A.</b> written responses",
                                                        "<b>B.</b> assignments",
                                                        "<b>C.</b> presentation reports",
                                                    ],
                                                    "name" => "jawaban_listening[21]"
                                                ],
                                                [ 
                                                    "no" => 23, 
                                                    "soal" => "What aspect of students’ self-management can volunteers assist greatly with improving?",
                                                    "pilihan" => [
                                                        "<b>A.</b> organizational skills",
                                                        "<b>B.</b> problem-solving skills",
                                                        "<b>C.</b> independent thinking skills",
                                                    ],
                                                    "name" => "jawaban_listening[22]"
                                                ],
                                                [ 
                                                    "no" => 24, 
                                                    "soal" => "What will volunteers try to develop in the students so that they exert themselves more?",
                                                    "pilihan" => [
                                                        "<b>A.</b> strong determinations",
                                                        "<b>B.</b> enthusiasm for personal work",
                                                        "<b>C.</b> hard work and diligence",
                                                    ],
                                                    "name" => "jawaban_listening[23]"
                                                ],
                                                [ 
                                                    "no" => 25, 
                                                    "soal" => "What is it that teachers have that allows them to respond to individual student requirements?",
                                                    "pilihan" => [
                                                        "<b>A.</b> exchange of information and skills",
                                                        "<b>B.</b> many different teaching styles",
                                                        "<b>C.</b> partnership between teachers",
                                                    ],
                                                    "name" => "jawaban_listening[24]"
                                                ],
                                            ];
                                        ?>

                                        <?php foreach ($data_soal_21_25 as $data_soal) :?>
                                            <?= soal_pg_ielts($data_soal)?>
                                        <?php endforeach;?>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST GENERAL</b></center>
                                        <p class="question">
                                            Questions 26-30 <br>
                                            Which of the following phrases is appropriate for the contents below?<br>
                                            Choose FIVE answers from the list, A-H, and write it next to questions 26-30
                                        </p>
                                        <div class="row">
                                            <div class="col-6">
                                                <p><b>List of contents:</b></p>
                                                <p><b>26)</b> Sharon and Lester have different		: <?= soal_isian_ielts("jawaban_listening[25]")?></p>
                                                <p><b>27)</b> Sharon and Lester help students’		: <?= soal_isian_ielts("jawaban_listening[26]")?></p>
                                                <p><b>28)</b> The program is well underway		: <?= soal_isian_ielts("jawaban_listening[27]")?></p>
                                                <p><b>29)</b> The liaison officer is impressed by	: <?= soal_isian_ielts("jawaban_listening[28]")?></p>
                                                <p><b>30)</b> Students are encouraged to take part in	: <?= soal_isian_ielts("jawaban_listening[29]")?></p>
                                            </div>
                                            <div class="col-6">
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            <b>List of Phrases</b><br>
                                                            <b>A.</b> Vocational learning experiences<br>
                                                            <b>B.</b> Practical components<br>
                                                            <b>C.</b> Self-learning software<br>
                                                            <b>D.</b> Academic background<br>
                                                            <b>E.</b> Marine studies <br>
                                                            <b>F.</b> Interesting developments<br>
                                                            <b>G.</b> Scholastic competitions<br>
                                                            <b>H.</b> Building and constructions
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST GENERAL</b></center>
                                        <p class="question">
                                            SECTION 4 | Questions 31-40<br>
                                            Questions 31-40<br>
                                            Complete the notes below<br>
                                            Write ONE WORD ONLY in each gap
                                        </p>
                                        <p><center><b>A Case Study of Anxiety</b></center></p>
                                        <p><b>General information:</b></p>
                                        <ul type="bullet">
                                            <li>someone in an anxiety state has worse <b>31)</b> <?= soal_isian_ielts("jawaban_listening[30]")?></li>
                                            <li>a phobia may stem from heredity or <b>32)</b> <?= soal_isian_ielts("jawaban_listening[31]")?> problems</li>
                                            <li>the reason for the final breakdown is generally linked with <b>33)</b> <?= soal_isian_ielts("jawaban_listening[32]")?> occurrences</li>
                                        </ul>
                                        <p><b>Phobic states:</b></p>
                                        <ul type="bullet">
                                            <li>Agoraphobia		: fears leaving the home <b>34)</b> <?= soal_isian_ielts("jawaban_listening[33]")?></li>
                                            <li>Claustrophobia	: fears small <b>35)</b> <?= soal_isian_ielts("jawaban_listening[34]")?></li>
                                            <li>
                                            Social phobia		: <br>
                                                                a. feels extremely shy in the <b>36)</b> <?= soal_isian_ielts("jawaban_listening[35]")?> of people<br>
                                                                b. becomes <b>37)</b> <?= soal_isian_ielts("jawaban_listening[36]")?> in front of other people<br>
                                                                c. gets sweaty <b>38)</b> <?= soal_isian_ielts("jawaban_listening[37]")?> of the body
                                            </li>
                                            <li>
                                                Single phobia		: <br>
                                                                    a. has a deep-seated <b>39)</b> <?= soal_isian_ielts("jawaban_listening[38]")?> to particular creatures<br>
                                                                    b. fears of the <b>40)</b> <?= soal_isian_ielts("jawaban_listening[39]")?>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="btn btn-success btnTransisiDua">Next<?= tablerIcon("arrow-narrow-right", "me-0")?></a>
                                </div>
                            </div>

                            <div class="sesi-reading" style="display:none">
                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>TRANSITION CARE FOR THE ELDERLY</h3></center></p>
                                        <p class='reading-1'>
                                            ((b))What is transition care?</span>((/b))((br))
                                            Transition care is for older people who have been receiving medical treatment, but need more help to recover, and time to make a decision about the best place for them to live in the longer term. You can only access transition care directly from the hospital.
                                        </p>
                                        <p class='reading-2'>
                                            Transition care is focused on individual goals and therapies and is given for a limited time only. It offers access to a package of services that may include:
                                        </p>
                                        <ul type='radio'>
                                            <li class='reading-3'>low-intensity therapy such as physiotherapy (exercise, mobility, strength and balance) and podiatry (foot care)</li>
                                            <li class='reading-4'>access to a social worker</li>
                                            <li class='reading-5'>nursing support for clinical care such as wound care</li>
                                            <li class='reading-6'>personal care</li>
                                        </ul>
                                        <p class='reading-7'>
                                            ((b))Who provides transition care services?((/b))(br)
                                            Transition care is often provided by non-government organisations and is subsidised by the government. If your circumstances allow, it is expected you’ll contribute to the cost of your care.
                                        </p>
                                        <p class='reading-8'>
                                            Daily care fees are set by the organisation that provides your transition care services (your service provider). They should explain these fees to you, and the amount charged should form part of the agreement between you and the service provider. The fee is calculated on a daily basis.
                                        </p>
                                        <p class='reading-9'>
                                            ((b))Where do I receive transition care?((/b))((br))
                                            Transition care is often provided by non-government organisations and is subsidised by the government. If your circumstances allow, it is expected you’ll contribute to the cost of your care.
                                        </p>
                                        <p class='reading-10'>
                                            ((b))What if I’m already receiving services through a different programme?((/b))(br)
                                            If you’re already receiving subsidised residential care in an aged-care home, but you need to go somewhere else for transition care, your place in the aged-care home will be held until you return.
                                        </p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION ONE | QUESTIONS 1-14<br>
                                            PASSAGE ONE (QUESTION 1-6)<br>
                                            Read the text below and answer Questions 1-6.
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            Questions 1-6<br>
                                                            Do the following statements agree with the information given in the reading passage?<br>
                                                            In boxes 1-6 on your answer sheet, write:
                                                        </p>
                                                        
                                                        <p>
                                                            <b>TRUE</b> if the statement agrees with the information<br>
                                                            <b>FALSE</b> if the statement contradicts the information<br>
                                                            <b>NOT GIVEN</b> if there is no information on this
                                                        </p>

                                                        <?php
                                                            $data_soal_1_6 = [
                                                                [ 
                                                                    "no" => 1, 
                                                                    "soal" => "Only hospital patients can go on to have transition care.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[0]"
                                                                ],
                                                                [ 
                                                                    "no" => 2, 
                                                                    "soal" => "Transition care may be long term or short term.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[1]"
                                                                ],
                                                                [ 
                                                                    "no" => 3, 
                                                                    "soal" => "Everyone receiving transition care must contribute to the cost.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[2]"
                                                                ],
                                                                [ 
                                                                    "no" => 4, 
                                                                    "soal" => "Transition care at home is only available for patients who live alone.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[3]"
                                                                ],
                                                                [ 
                                                                    "no" => 5, 
                                                                    "soal" => "Transition care may be given on a hospital site.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[4]"
                                                                ],
                                                                [ 
                                                                    "no" => 6, 
                                                                    "soal" => "You may lose your place in a care home if you have to leave it to receive transition care.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[5]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_1_6 as $data_soal) :?>
                                                            <?= soal_pg_ielts($data_soal)?>
                                                        <?php endforeach;?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>CABIN BAGS FOR AIR TRAVEL</h3></center></p>
                                        <p><center><i>If you want a small bag with wheels that you can take onto the plane with you, there’s a wide choice. Here are some of the best.</i></center></p>
                                        <p class='reading-11'>
                                            ((b))A The Flyer B3((/b)) is an ultra-lightweight cabin bag which can withstand some pretty harsh treatment, its nylon and polyester sides won’t rip or burst open if it’s dropped or thrown whilst in transit. However, the trolley handle feels quite thin and flimsy. The top carrying handle is hard and flat, and the side handle isn’t easy to grip.
                                        </p>
                                        <p class='reading-12'>
                                            ((b))B The Lightglide((/b)) has two external pockets, both of which are zipped and lockable, but the inside pocket does not zip. In tests, we found the contents remain dry when given a good soaking, even around the zips. The trolley handle has a choice of two heights and the plastic hand grip doesn’t have any sharp ridges that’ll make your hands sore. For carrying there are fabric handles at the top and side.
                                        </p>
                                        <p class='reading-13'>
                                            ((b))C The Foxton((/b)) is easy to control across most surfaces. However, the zips don’t always run smoothly especially around the corners, so you may have to give them a good tug, especially if the case is very full. This is definitely one to avoid if you’re going somewhere rainy as it lets loads of water in, and documents in the pockets will also get pretty wet unless they’re in plastic folders.
                                        </p>
                                        <p class='reading-14'>
                                            ((b))D The Skybag((/b)) has a single external zipped pocket and another located inside the lid. Your clothes are kept in place by two adjustable straps. The zips are easy to grip and they run smoothly around the case. However, this cabin bag felt a little heavy to pull on all but smooth floors, and it was hard to steer compared with some of the other suitcases.
                                        </p>
                                        <p class='reading-15'>
                                            ((b))E The Travelsure 35((/b)) is available in a huge range of fabric designs including leopard print or lipstick kisses. The retractable trolley handle is comfortable but can’t be adjusted to suit users of different heights. There’s no internal divider, but there are two handy zipped pockets in the lid. We test each bag by letting it fall onto a hard floor – and our results show that you’ll have to treat this bag with great care if you want it to last. The fabric tore so badly at one of the corners that it was unusable.
                                        </p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PASSAGE TWO (QUESTION 7-14)<br>
                                            Read the text below and answer Questions 7-14
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            Questions 7-14<br>
                                                            The above text has five paragraphs, A-E.<br>
                                                            Which paragraph mentions the following?
                                                        </p>

                                                        <p><i>Write the correct letter, <b>A-E</b>, in boxes <b>7-14</b> on your answer sheet. <br><b>NB.</b> You may use any letter more than once.</i></p>
                                                        
                                                        <p><b>7.</b> The zips on this cabin bag may be difficult to use. <?= soal_isian_ielts("jawaban_reading[6]")?></p>
                                                        <p><b>8.</b> This cabin bag may be badly damaged if it is dropped. <?= soal_isian_ielts("jawaban_reading[7]")?></p>
                                                        <p><b>9.</b> The handles of this cabin bag have a number of different problems. <?= soal_isian_ielts("jawaban_reading[8]")?></p>
                                                        <p><b>10.</b> This cabin bag is very resistant to water. <?= soal_isian_ielts("jawaban_reading[9]")?></p>
                                                        <p><b>11.</b> There’s a good choice of patterns for the fabric of this cabin bag. <?= soal_isian_ielts("jawaban_reading[10]")?></p>
                                                        <p><b>12.</b> This cabin bag isn’t very easy to move around. <?= soal_isian_ielts("jawaban_reading[11]")?></p>
                                                        <p><b>13.</b> This cabin bag has just one internal zipped pocket. <?= soal_isian_ielts("jawaban_reading[12]")?></p>
                                                        <p><b>14.</b> The trolley handle of this cabin bag is adjustable <?= soal_isian_ielts("jawaban_reading[13]")?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>College Car Parking Policy – Staff</h3></center></p>
                                        <div class='reading-16'>
                                            ((p1))
                                                ((b1))Parking permits and tickets((/b1))((br1))
                                                Staff permits are required to park a motor vehicle (other than a motorcycle parked in the cycle bays) on campus between 8.30 am and 4.30 pm, Monday to Friday, during term time. Annual permits can be purchased from the Hospitality Department. Application forms can be downloaded from the College website. All permits/tickets must be clearly displayed in the windscreen of vehicles during the dates of term time, as published in the academic calendar. Please inform the Services Administrator of any changes to registration details on telephone ext. 406. Annual car parking permits can be purchased from 20th September and are valid for one academic year from 1st October to 30th June. The annual charges for car parking are displayed on the application form.
                                            ((/p1))
                                            ((p2))
                                                ((b2))Enforcement((/b2))((br2))
                                                The nominated contractor will issue fixed Penalty Charge Notices (see below) on vehicles that fail to display a valid permit and/or parking ticket, or vehicles that are parked on yellow lines or in disabled parking bays without displaying a blue disabled-parking permit. Reductions of parking space availability may arise in order to accommodate College recruitment activities and/or estate development/maintenance projects. Vehicles that are in breach of the policy will be issued with a Penalty Charge Notice.
                                            ((/p2))
                                            ((p3))
                                                ((b3))Penalty Charge Notice (PCM)((/b3))((br3))
                                                The PCN is £30, increasing to £60 seven days after issue. The nominated contractor is responsible for the collection of unpaid PCNs and may use legal action where necessary to recover unpaid PCNs. If issued with a PCN, appeals must be taken up directly with the parking enforcement company (details included on the notice) ((b4))((u4))not((/u4))((/b4)) the college.
                                            ((/p3))
                                            ((p5))
                                                ((b5))Disabled parking((/b5))((br5))
                                                The college has designated car parking spaces for disabled car drivers. The college will make all reasonable efforts to ensure these parking spaces are used only by drivers who display their blue disabled-parking permits, and a valid pay-and-display or annual permit, as appropriate.((br6))
                                                If issues arise concerning the availability of the parking spaces, those concerned should raise the matter with the Domestic Services Department in order to effect a temporary solution.
                                            ((/p5))
                                            ((p7))
                                                ((b7))Visitors((/b7))((br7))
                                                The College welcomes visitors and provides parking arrangements through pre-arranged permits, which must be displayed in the vehicle. Please contact the Hospitality Department for further information, On Open Days, sections of car parking on campus may be reserved for visitors.
                                            ((/p7))
                                            ((p8))
                                                ((b8))Short-term drop-off/pick-up provision((/b8))((br8))
                                                There will be two short-term drop-off/pick-up spaces for users of the nursery, with a maximum of ten minutes’ waiting time allowed. These are located outside Concorde Building. The nursery staff bays may not be used under any circumstances.
                                            ((/p8))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION TWO | QUESTIONS 15-27<br>
                                            You should spend about 20 minutes on Questions 15-27, which are based on Reading Passages below. Write answers to questions in boxes 15-27 on your answer sheet.
                                        </p>
                                        <p class="question">
                                            PASSAGE THREE (QUESTION 15-20)<br>
                                            Read the text below and answer Questions 15-20
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            Questions 15-20<br>
                                                            Answer the questions below.<br>
                                                            Choose NO MORE THAN THREE WORDS AND/OR A NUMBER from the text for each answer.<br>
                                                            Write your answers in boxes 15-20 on your answer sheet.
                                                        </p>

                                                        <p><b>15.</b> Where can you buy parking permits at the college? <?= soal_isian_ielts("jawaban_reading[14]")?></p>
                                                        <p><b>16.</b> Which document shows the dates of term time? <?= soal_isian_ielts("jawaban_reading[15]")?></p>
                                                        <p><b>17.</b> What is the start date of annual parking permits? <?= soal_isian_ielts("jawaban_reading[16]")?></p>
                                                        <p><b>18.</b> Who is responsible for giving out parking fines if you park in the wrong place? <?= soal_isian_ielts("jawaban_reading[17]")?></p>
                                                        <p><b>19.</b> What do visitors need to show when parking? <?= soal_isian_ielts("jawaban_reading[18]")?></p>
                                                        <p><b>20.</b> Where can the nursery pick-up point be found? <?= soal_isian_ielts("jawaban_reading[19]")?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>Maternity Benefits</h3></center></p>
                                        <div class='reading-17'>
                                            ((p1))
                                                If you are expecting a baby, there are a number of benefit schemes that could help you financially. However, eligibility differs for each individual scheme.
                                            ((/p1))
                                            ((p2))
                                                ((b2))Statutory Maternity Pay (SMP)((/b2))((br2))
                                                You may be entitled to Statutory Maternity Pay (SMP) from your employer. This is a weekly payment, to help make it easier for you to take time off, both before and after the birth of your baby. SMP can be paid for up to 39 weeks.
                                            ((/p2))
                                            ((p3))
                                                You are entitled to SMP if you have been employed by the same company for at least 26 weeks by the end of the 15th week before your baby is due. You must also be earning an average of at least £87 per week (before tax). The amount you get depends on how much you earn. For 6 weeks, you will receive 90% of your average weekly earnings. Then you will receive £112.75 per week for the remaining 33 weeks.
                                            ((/p3))
                                            ((p4))
                                                ((b4))Maternity Allowance (MA)((/b4))((br4))
                                                Maternity Allowance (MA) is available to those who are employed or self-employed but not eligible for Statutory Maternity Pay (SMP). You may be entitled to Maternity Allowance if you have been employed or self-employed for at least 26 weeks in the 66 weeks before you are due to give birth. You don’t have to work for the same employer for those 26 weeks. You also don’t have to work full weeks (as a part week counts as a full week) during the same period. Maternity Allowance can be paid for up to 39 weeks, and is either paid at the same standard rate as SMP or 90% of your average weekly earnings. You’ll receive whichever amount is the lower. You can find Maternity Allowance forms at antenatal clinics throughout the country.
                                            ((/p4))
                                            ((p5))
                                                ((b5))Child Tax Credit((/b5))((br5))
                                                If you’re on a low income, over 16, and are responsible for at least one child, you may also be entitled to Child Tax Credit. The amount you get will depend on your personal circumstances and income. When your income is being assessed, any child benefit, maintenance payments or Maternity Allowance payments will not be classed as income. This means that it will not be taken into account when calculating your Child Tax Credit.
                                            ((/p5))
                                            ((p6))
                                                ((b6))Sure Start Maternity Payments((/b6))((br6))
                                                If you get benefits or Child Tax Credit because you’re on a low income, then you may be entitled to Sure Start Maternity Payments. These are individual grants to help towards the cost of a new baby.
                                            ((/p6))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION TWO | QUESTIONS 15-27<br>
                                            You should spend about 20 minutes on Questions 15-27, which are based on Reading Passages below. Write answers to questions in boxes 15-27 on your answer sheet.
                                        </p>
                                        <p class="question">
                                            PASSAGE FOUR (QUESTION 21-27)<br>
                                            Read the text below and answer Questions 21-27.
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            Questions 21-27<br>
                                                            Answer the questions below.<br>
                                                            Choose NO MORE THAN TWO WORDS AND/OR A NUMBER from the text for each answer.<br>
                                                            Write your answers in boxes 21-27 on your answer sheet.
                                                        </p>
                                                        
                                                        <p><b>21.</b> What is the minimum period you must have worked for an employer in order to be eligible for SMP? <?= soal_isian_ielts("jawaban_reading[20]")?></p>
                                                        <p><b>22.</b> For how long is SMP payable every week as a percentage of your average weekly earnings? <?= soal_isian_ielts("jawaban_reading[21]")?></p>
                                                        <p><b>23.</b> What sum is payable every week as the second part of SMP entitlement? <?= soal_isian_ielts("jawaban_reading[22]")?></p>
                                                        <p><b>24.</b> What is the maximum length of time MA is payable? <?= soal_isian_ielts("jawaban_reading[23]")?></p>
                                                        <p><b>25.</b> Where can MA forms be obtained? <?= soal_isian_ielts("jawaban_reading[24]")?></p>
                                                        <p><b>26.</b> Apart from income, what else is considered when assessing how much Child Tax Credit is paid? <?= soal_isian_ielts("jawaban_reading[25]")?></p>
                                                        <p><b>27.</b> What are Sure Start Maternity Payments? <?= soal_isian_ielts("jawaban_reading[26]")?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>PAPYRUS</h3></center></p>
                                        <p>
                                            <i>
                                                Used by the ancient Egyptians to make paper, the papyrus plant has<br>
                                                helped to shape the world we live in
                                            </i>
                                        </p>
                                        <div class='reading-18'>
                                            ((p1))
                                                ((b1))A.((/b1)) Libraries and archives are cultural crossroads of knowledge exchange, where the past transmits information to the present, and where the present has the opportunity to inform the future. Bureaucracies have become the backbone of civilizations, as governments try to keep track of populations, business transactions and taxes. At a personal level, our lives are governed by the documents we possess; we are certified on paper literally from birth to death. And written documentation carries enormous cultural importance: consider the consequences of signing the Foundation Document of the United Nations or the Convention on Biological Diversity.((br1))
                                                Documentation requires a writing tool and a surface upon which to record the information permanently. About 5,000 years ago, the Sumerians started to use reeds or sticks to make marks on mud blocks which were then baked, but despite being fireproof, these were difficult to store. Other cultures used more flexible but less permanent surfaces, including animal skins and wood strips. In western culture, the adoption of papyrus was to have a great impact. Sheets of papyrus not only provide an invaluable record of people’s daily lives, they can also be dated using carbon-dating techniques, giving precise information about the age of the text written on them.
                                            ((/p1))
                                            ((p2))
                                                ((b2))B.((/b2)) Papyrus is strongly associated with Egyptian culture, although all the ancient civilizations around the Mediterranean used it. The papyrus sedge is a tall grass-like plant. It was harvested from shallow water and swamplands on the banks of the River Nile. Manufacturing sheets of papyrus from papyrus sedge was a complex, messy process. Pith from inside the plant’s stem was cut into long strips that were laid side by side. These were then covered with a second layer of strips which were laid at right angles to the first, then soaked in water and hammered together. The sheet was then crushed to extract the water, dried and then polished to produce a high-quality writing surface, individual sheets could be glued together and rolled up to make scrolls or folded and bound to form books.
                                            ((/p2))
                                            ((p3))
                                                ((b3))C.((/b3)) In moist climates, the cellulose-rich sheets of papyrus would readily decay, becoming covered by mould or full of holes from attacks by insects. But in dry climates, such as the Middle East, papyrus is a stable, rot-resistant writing surface. The earliest known roll of papyrus scroll was found in the tomb of an official called Hemeka near Memphis, which was then the capital city of Egypt, and is around five thousand years old. in 79CE, nearly 2,000 papyrus scrolls in the library of Julius Caesar’s father-in-law were protected at Herculaneum by ash from the catastrophic eruption of Mount Vesuvius. However, the most famous discoveries of papyrus have come from the rubbish dumps of the ancient town of Oxyrhynchus, some 160km south-west of Cairo, in the desert to the west of the Nile. Oxyrhynchus was a regional administrative capital and for a thousand years generated vast amounts of administrative documentation, including accounts, tax returns and correspondence, which was periodically discarded to make room for more. Over time, a thick layer of sand covered these dumps, andthey were forgotten. But the documents were protected by the sand, creating a time capsule that allowed astonishing glimpses into the lives of the town’s inhabitants over hundreds of years.((br3))
                                                Collections of documents that record information and ideas have frequently been viewed as potentially dangerous. For thousands of years, governments, despots and conquerors have resorted to burning libraries and books to rid themselves of inconvenient evidence or obliterate cultures and ideas that they found politically, morally or religiously unacceptable. One such calamity, the burning of the Great Library of Alexandria, and the papyrus scrolls and books it contained, has been mythologized and has come to symbolize the global loss of cultural knowledge.
                                            ((/p3))
                                            ((p4))
                                                ((b4))D.((/b4)) Besides their use in record-keeping, papyrus stems were used in many other aspects of Mediterranean life, such as for boat construction and making ropes, sails and baskets, as well as being a source of food. In 1969 the adventurer Thor Heyerdahl attempted to cross the Atlantic from Morocco in the boat Ra, to show that it was possible for mariners in ancient times to cross the Atlantic Ocean. Ra was made from bundles of papyrus stems and modelled on ancient Egyptian craft. As a marshland plant, papyrus sedge stabilizes soils and reduces erosion, while some investigations show that it has potential for water purification and sewage treatment.
                                            ((/p4))
                                            ((p5))
                                                ((b5))E.((/b5)) True paper was probably invented in China in the first century CE. Like papyrus, it was constructed from a meshwork of plant fibres, but the Chinese used fibres from the white mulberry tree, which yielded a tough, flexible material that could be folded, stretched, and compressed. The adoption of this paper by western cultures soon rendered papyrus obsolete.((br5))
                                                Despite dreams of paper-free societies, western cultures still use enormous quantities of paper, often in ways that it would be inconceivable to use papyrus for. As a paper substitute, the role of the papyrus sedge in western cultures has been superseded; papyrus is little more than a niche product for the tourist market. What makes papyrus noteworthy for western societies nowadays is its use as the surface upon which our ancient ancestors recorded their lives, their art and their science. In the words of the ancient Roman philosopher Pliny the Elder, it is ‘the material on which the immortality of human beings depends’.
                                            ((/p5))
                                            ((p6))
                                                ((i6))
                                                    From Stephen Harris, Wha thave Plants Ever Done for Us?, Bodleian Library Publishing 2015. Reprinted by kind permission of Bodleian Library Publishing.
                                                ((/i6))
                                            ((/p6))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION THREE | QUESTIONS 28-40<br>
                                            PASSAGE FIVE (QUESTION 28-40)
                                        </p>
                                        <p class="question">
                                            You should spend about 20 minutes on Questions 28-40, which are based on Reading Passages below.<br>
                                            Write answers to questions in boxes 28-40 on your answer sheet.
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            Question 28-32<br>
                                                            The text below has five sections, A-E.<br>
                                                            Choose the correct heading for each section from the list of headings below.<br>
                                                            Write the correct number i-viii in boxes 28-32 on your answer sheet.
                                                        </p>

                                                        <p>
                                                            <b>List of Headings</b> <br>
                                                            <b>i.</b> Solving the puzzle of a papyrus document<br>
                                                            <b>ii.</b> The importance of written records and different ways of recording them<br>
                                                            <b>iii.</b> The use of papyrus for a range of purposes<br>
                                                            <b>iv.</b> Suggestions for future possibilities for papyrus<br>
                                                            <b>v.</b> How papyrus was cultivated and different manufacturing methods<br>
                                                            <b>vi.</b> The decline of papyrus use<br>
                                                            <b>vii.</b> The preservation and destruction of papyrus documents<br>
                                                            <b>viii.</b> The process of papyrus production
                                                        </p>
                                                        
                                                        <p><b>28.</b> Section A <?= soal_isian_ielts("jawaban_reading[27]")?></p>
                                                        <p><b>29.</b> Section B <?= soal_isian_ielts("jawaban_reading[28]")?></p>
                                                        <p><b>30.</b> Section C <?= soal_isian_ielts("jawaban_reading[29]")?></p>
                                                        <p><b>31.</b> Section D <?= soal_isian_ielts("jawaban_reading[30]")?></p>
                                                        <p><b>32.</b> Section E <?= soal_isian_ielts("jawaban_reading[31]")?></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>PAPYRUS</h3></center></p>
                                        <p>
                                            <i>
                                                Used by the ancient Egyptians to make paper, the papyrus plant has<br>
                                                helped to shape the world we live in
                                            </i>
                                        </p>
                                        <div class='reading-19'>
                                            ((p1))
                                                ((b1))A.((/b1)) Libraries and archives are cultural crossroads of knowledge exchange, where the past transmits information to the present, and where the present has the opportunity to inform the future. Bureaucracies have become the backbone of civilizations, as governments try to keep track of populations, business transactions and taxes. At a personal level, our lives are governed by the documents we possess; we are certified on paper literally from birth to death. And written documentation carries enormous cultural importance: consider the consequences of signing the Foundation Document of the United Nations or the Convention on Biological Diversity.((br1))
                                                Documentation requires a writing tool and a surface upon which to record the information permanently. About 5,000 years ago, the Sumerians started to use reeds or sticks to make marks on mud blocks which were then baked, but despite being fireproof, these were difficult to store. Other cultures used more flexible but less permanent surfaces, including animal skins and wood strips. In western culture, the adoption of papyrus was to have a great impact. Sheets of papyrus not only provide an invaluable record of people’s daily lives, they can also be dated using carbon-dating techniques, giving precise information about the age of the text written on them.
                                            ((/p1))
                                            ((p2))
                                                ((b2))B.((/b2)) Papyrus is strongly associated with Egyptian culture, although all the ancient civilizations around the Mediterranean used it. The papyrus sedge is a tall grass-like plant. It was harvested from shallow water and swamplands on the banks of the River Nile. Manufacturing sheets of papyrus from papyrus sedge was a complex, messy process. Pith from inside the plant’s stem was cut into long strips that were laid side by side. These were then covered with a second layer of strips which were laid at right angles to the first, then soaked in water and hammered together. The sheet was then crushed to extract the water, dried and then polished to produce a high-quality writing surface, individual sheets could be glued together and rolled up to make scrolls or folded and bound to form books.
                                            ((/p2))
                                            ((p3))
                                                ((b3))C.((/b3)) In moist climates, the cellulose-rich sheets of papyrus would readily decay, becoming covered by mould or full of holes from attacks by insects. But in dry climates, such as the Middle East, papyrus is a stable, rot-resistant writing surface. The earliest known roll of papyrus scroll was found in the tomb of an official called Hemeka near Memphis, which was then the capital city of Egypt, and is around five thousand years old. in 79CE, nearly 2,000 papyrus scrolls in the library of Julius Caesar’s father-in-law were protected at Herculaneum by ash from the catastrophic eruption of Mount Vesuvius. However, the most famous discoveries of papyrus have come from the rubbish dumps of the ancient town of Oxyrhynchus, some 160km south-west of Cairo, in the desert to the west of the Nile. Oxyrhynchus was a regional administrative capital and for a thousand years generated vast amounts of administrative documentation, including accounts, tax returns and correspondence, which was periodically discarded to make room for more. Over time, a thick layer of sand covered these dumps, andthey were forgotten. But the documents were protected by the sand, creating a time capsule that allowed astonishing glimpses into the lives of the town’s inhabitants over hundreds of years.((br3))
                                                Collections of documents that record information and ideas have frequently been viewed as potentially dangerous. For thousands of years, governments, despots and conquerors have resorted to burning libraries and books to rid themselves of inconvenient evidence or obliterate cultures and ideas that they found politically, morally or religiously unacceptable. One such calamity, the burning of the Great Library of Alexandria, and the papyrus scrolls and books it contained, has been mythologized and has come to symbolize the global loss of cultural knowledge.
                                            ((/p3))
                                            ((p4))
                                                ((b4))D.((/b4)) Besides their use in record-keeping, papyrus stems were used in many other aspects of Mediterranean life, such as for boat construction and making ropes, sails and baskets, as well as being a source of food. In 1969 the adventurer Thor Heyerdahl attempted to cross the Atlantic from Morocco in the boat Ra, to show that it was possible for mariners in ancient times to cross the Atlantic Ocean. Ra was made from bundles of papyrus stems and modelled on ancient Egyptian craft. As a marshland plant, papyrus sedge stabilizes soils and reduces erosion, while some investigations show that it has potential for water purification and sewage treatment.
                                            ((/p4))
                                            ((p5))
                                                ((b5))E.((/b5)) True paper was probably invented in China in the first century CE. Like papyrus, it was constructed from a meshwork of plant fibres, but the Chinese used fibres from the white mulberry tree, which yielded a tough, flexible material that could be folded, stretched, and compressed. The adoption of this paper by western cultures soon rendered papyrus obsolete.((br5))
                                                Despite dreams of paper-free societies, western cultures still use enormous quantities of paper, often in ways that it would be inconceivable to use papyrus for. As a paper substitute, the role of the papyrus sedge in western cultures has been superseded; papyrus is little more than a niche product for the tourist market. What makes papyrus noteworthy for western societies nowadays is its use as the surface upon which our ancient ancestors recorded their lives, their art and their science. In the words of the ancient Roman philosopher Pliny the Elder, it is ‘the material on which the immortality of human beings depends’.
                                            ((/p5))
                                            ((p6))
                                                ((i6))
                                                    From Stephen Harris, Wha thave Plants Ever Done for Us?, Bodleian Library Publishing 2015. Reprinted by kind permission of Bodleian Library Publishing.
                                                ((/i6))
                                            ((/p6))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION THREE | QUESTIONS 28-40<br>
                                            PASSAGE FIVE (QUESTION 28-40)
                                        </p>
                                        <p class="question">
                                            You should spend about 20 minutes on Questions 28-40, which are based on Reading Passages below.<br>
                                            Write answers to questions in boxes 28-40 on your answer sheet.
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            Questions 33-37<br>
                                                            Choose the correct letter, A, B, C or D.<br>
                                                            Write the correct letter in boxes 33-37 on your answer sheet.
                                                        </p>
                                                        
                                                        <?php
                                                            $data_soal_33_37 = [
                                                                [ 
                                                                    "no" => 33, 
                                                                    "soal" => "What was the problem with using animal skins and wood strips for writing on?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> They did not last for a long time.",
                                                                        "<b>B.</b> They were not easy to store.",
                                                                        "<b>C.</b> They were insufficiently flexible.",
                                                                        "<b>D.</b> They could be destroyed by fire.",
                                                                    ],
                                                                    "name" => "jawaban_reading[32]"
                                                                ],
                                                                [ 
                                                                    "no" => 34, 
                                                                    "soal" => "Why did papyrus manufacturers hammer the papyrus?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> to remove water from the pith strips",
                                                                        "<b>B.</b> to join the layers of pith strips together",
                                                                        "<b>C.</b> to allow the pith strips to be easily cut",
                                                                        "<b>D.</b> to position the layers of pith strips at the correct angle",
                                                                    ],
                                                                    "name" => "jawaban_reading[33]"
                                                                ],
                                                                [ 
                                                                    "no" => 35, 
                                                                    "soal" => "When referring to burning libraries and books, the writer is suggesting that",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> information can be used for harm as well as for good.",
                                                                        "<b>B.</b> new ways must be found to ensure information is not lost.",
                                                                        "<b>C.</b> cultural knowledge depends on more than written texts.",
                                                                        "<b>D.</b> those in power may Wish to keep others in ignorance.",
                                                                    ],
                                                                    "name" => "jawaban_reading[34]"
                                                                ],
                                                                [ 
                                                                    "no" => 36, 
                                                                    "soal" => "The writer refers to Thor Heyerdahl to illustrate the point that",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> papyrus could be used as a food on long sea voyages.",
                                                                        "<b>B.</b> the ancient Egyptians already had advanced navigation skills.",
                                                                        "<b>C.</b> papyrus could be used to build boats for long sea journeys.",
                                                                        "<b>D.</b> the ancient Egyptians knew of the environmental benefits of papyrus",
                                                                    ],
                                                                    "name" => "jawaban_reading[35]"
                                                                ],
                                                                [ 
                                                                    "no" => 37, 
                                                                    "soal" => "What does the writer conclude about papyrus today?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> It is better for the environment than using paper.",
                                                                        "<b>B.</b> Its significance is restricted to its role in the past.",
                                                                        "<b>C.</b> It is still the best writing surface for some purposes.",
                                                                        "<b>D.</b> More efforts need to be made to ensure it stays in use.",
                                                                    ],
                                                                    "name" => "jawaban_reading[36]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_33_37 as $data_soal) :?>
                                                            <?= soal_pg_ielts($data_soal)?>
                                                        <?php endforeach;?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>PAPYRUS</h3></center></p>
                                        <p>
                                            <i>
                                                Used by the ancient Egyptians to make paper, the papyrus plant has<br>
                                                helped to shape the world we live in
                                            </i>
                                        </p>
                                        <div class='reading-20'>
                                            ((p1))
                                                ((b1))A.((/b1)) Libraries and archives are cultural crossroads of knowledge exchange, where the past transmits information to the present, and where the present has the opportunity to inform the future. Bureaucracies have become the backbone of civilizations, as governments try to keep track of populations, business transactions and taxes. At a personal level, our lives are governed by the documents we possess; we are certified on paper literally from birth to death. And written documentation carries enormous cultural importance: consider the consequences of signing the Foundation Document of the United Nations or the Convention on Biological Diversity.((br1))
                                                Documentation requires a writing tool and a surface upon which to record the information permanently. About 5,000 years ago, the Sumerians started to use reeds or sticks to make marks on mud blocks which were then baked, but despite being fireproof, these were difficult to store. Other cultures used more flexible but less permanent surfaces, including animal skins and wood strips. In western culture, the adoption of papyrus was to have a great impact. Sheets of papyrus not only provide an invaluable record of people’s daily lives, they can also be dated using carbon-dating techniques, giving precise information about the age of the text written on them.
                                            ((/p1))
                                            ((p2))
                                                ((b2))B.((/b2)) Papyrus is strongly associated with Egyptian culture, although all the ancient civilizations around the Mediterranean used it. The papyrus sedge is a tall grass-like plant. It was harvested from shallow water and swamplands on the banks of the River Nile. Manufacturing sheets of papyrus from papyrus sedge was a complex, messy process. Pith from inside the plant’s stem was cut into long strips that were laid side by side. These were then covered with a second layer of strips which were laid at right angles to the first, then soaked in water and hammered together. The sheet was then crushed to extract the water, dried and then polished to produce a high-quality writing surface, individual sheets could be glued together and rolled up to make scrolls or folded and bound to form books.
                                            ((/p2))
                                            ((p3))
                                                ((b3))C.((/b3)) In moist climates, the cellulose-rich sheets of papyrus would readily decay, becoming covered by mould or full of holes from attacks by insects. But in dry climates, such as the Middle East, papyrus is a stable, rot-resistant writing surface. The earliest known roll of papyrus scroll was found in the tomb of an official called Hemeka near Memphis, which was then the capital city of Egypt, and is around five thousand years old. in 79CE, nearly 2,000 papyrus scrolls in the library of Julius Caesar’s father-in-law were protected at Herculaneum by ash from the catastrophic eruption of Mount Vesuvius. However, the most famous discoveries of papyrus have come from the rubbish dumps of the ancient town of Oxyrhynchus, some 160km south-west of Cairo, in the desert to the west of the Nile. Oxyrhynchus was a regional administrative capital and for a thousand years generated vast amounts of administrative documentation, including accounts, tax returns and correspondence, which was periodically discarded to make room for more. Over time, a thick layer of sand covered these dumps, andthey were forgotten. But the documents were protected by the sand, creating a time capsule that allowed astonishing glimpses into the lives of the town’s inhabitants over hundreds of years.((br3))
                                                Collections of documents that record information and ideas have frequently been viewed as potentially dangerous. For thousands of years, governments, despots and conquerors have resorted to burning libraries and books to rid themselves of inconvenient evidence or obliterate cultures and ideas that they found politically, morally or religiously unacceptable. One such calamity, the burning of the Great Library of Alexandria, and the papyrus scrolls and books it contained, has been mythologized and has come to symbolize the global loss of cultural knowledge.
                                            ((/p3))
                                            ((p4))
                                                ((b4))D.((/b4)) Besides their use in record-keeping, papyrus stems were used in many other aspects of Mediterranean life, such as for boat construction and making ropes, sails and baskets, as well as being a source of food. In 1969 the adventurer Thor Heyerdahl attempted to cross the Atlantic from Morocco in the boat Ra, to show that it was possible for mariners in ancient times to cross the Atlantic Ocean. Ra was made from bundles of papyrus stems and modelled on ancient Egyptian craft. As a marshland plant, papyrus sedge stabilizes soils and reduces erosion, while some investigations show that it has potential for water purification and sewage treatment.
                                            ((/p4))
                                            ((p5))
                                                ((b5))E.((/b5)) True paper was probably invented in China in the first century CE. Like papyrus, it was constructed from a meshwork of plant fibres, but the Chinese used fibres from the white mulberry tree, which yielded a tough, flexible material that could be folded, stretched, and compressed. The adoption of this paper by western cultures soon rendered papyrus obsolete.((br5))
                                                Despite dreams of paper-free societies, western cultures still use enormous quantities of paper, often in ways that it would be inconceivable to use papyrus for. As a paper substitute, the role of the papyrus sedge in western cultures has been superseded; papyrus is little more than a niche product for the tourist market. What makes papyrus noteworthy for western societies nowadays is its use as the surface upon which our ancient ancestors recorded their lives, their art and their science. In the words of the ancient Roman philosopher Pliny the Elder, it is ‘the material on which the immortality of human beings depends’.
                                            ((/p5))
                                            ((p6))
                                                ((i6))
                                                    From Stephen Harris, Wha thave Plants Ever Done for Us?, Bodleian Library Publishing 2015. Reprinted by kind permission of Bodleian Library Publishing.
                                                ((/i6))
                                            ((/p6))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION THREE | QUESTIONS 28-40<br>
                                            PASSAGE FIVE (QUESTION 28-40)
                                        </p>
                                        <p class="question">
                                            You should spend about 20 minutes on Questions 28-40, which are based on Reading Passages below.<br>
                                            Write answers to questions in boxes 28-40 on your answer sheet.
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            Questions 38-40<br>
                                                            Complete the summary below.<br>
                                                            Choose ONE WORD ONLY from the text for each answer.<br>
                                                            Write your answers in boxes 38-40 on your answer sheet.
                                                        </p>

                                                        <p>
                                                            <center><b>How Papyrus Documents have Survived</b></center>
                                                        </p>
                                                        <p>
                                                            Papyrus is rich in cellulose and in some conditions will be destroyed by fungal growths or be consumed by <b>(38)</b> <?= soal_isian_ielts("jawaban_reading[37]")?>. However, it can survive for long periods in an environment that is dry. It has been found in a 5,000-year-old <b>(39)</b> <?= soal_isian_ielts("jawaban_reading[38]")?>. in Egypt, and in Herculaneum many papyrus documents were preserved following a huge <b>(40)</b> <?= soal_isian_ielts("jawaban_reading[39]")?>. in 79 CE. in the town of Oxyrhynchus, unwanted administrative documents were left on rubbish dumps which were covered with sand, preserving them for many years.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="btn btn-success btnTransisiTiga">Next<?= tablerIcon("arrow-narrow-right", "me-0")?></a>
                                </div>
                            </div>

                            <div class="sesi-writing" style="display:none">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="question mb-3">
                                            IELTS WRITING TASK ONE<br>
                                            You should spend about 20 minutes on this task 
                                        </p>

                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <i>
                                                        You have a penfriend living in another country and he/she is curious to know about the major news items in your country.<br>
                                                        Briefly describe ONE news story that has been on TV, on the TV radio, or in the newspapers in your country, and explain why people are interested in it. 
                                                    </i>
                                                </td>
                                            </tr>
                                        </table>

                                        <p>
                                            You should write at least 150 words.<br>
                                            You do NOT need to write your own address. <br>
                                            Begin your letter as follows:<br>
                                            Dear, __________________________
                                        </p>

                                        <span>Type your answer here</span>
                                        <textarea id="textarea-1" class="form-control mb-3" name="text_writing[0]" data-bs-toggle="autosize" placeholder="" style="overflow: hidden scroll; overflow-wrap: break-word; resize: none; height: 56px;"></textarea>
                                        <center>Total word Count : <span id="count-textarea-1">0</span></center>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="question mb-3">
                                            IELTS WRITING TASK TWO<br>
                                            You should spend about 40 minutes on this task<br>
                                        </p>

                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <i>Some people believe that living in big cities is becoming more difficult. Others believe that it is getting easier. Discuss both views and give your own opinion.</i>
                                                </td>
                                            </tr>
                                        </table>

                                        <p>Write at least 250 words.</p>

                                        <span>Type your answer here</span>
                                        <textarea id="textarea-2" class="form-control mb-3" name="text_writing[1]" data-bs-toggle="autosize" placeholder="" style="overflow: hidden scroll; overflow-wrap: break-word; resize: none; height: 56px;"></textarea>
                                        <center>Total word Count : <span id="count-textarea-2">0</span></span></center>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="btn btn-primary btnSimpan">Save</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view("_partials/footer-bar")?>
                </div>
            </div>
        </div>
    </form>

    <?php  
        if(isset($js)) :
            foreach ($js as $i => $js) :?>
                <script src="<?= base_url()?>assets/myjs/<?= $js?>"></script>
                <?php 
            endforeach;
        endif;    
    ?>

<?php $this->load->view("_partials/footer")?>

<script>

    $("#textarea-1").on('keyup', function(e) {
        var words = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
        // if (words <= 150) {
            $('#count-textarea-1').text(words);
        //     $('#count-left-1').text(150-words)
        // }else{
        //     // Split the string on first 200 words and rejoin on spaces
        //     var trimmed = $(this).val().split(/\s+/, 150).join(" ");
        //     // Add a space at the end to keep new typing making new words
        //     $(this).val(trimmed + " ");
        // }
    });

    $("#textarea-2").on('keyup', function(e) {
        var words = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
        // if (words <= 250) {
            $('#count-textarea-2').text(words);
        //     $('#count-left-2').text(250-words)
        // }else{
        //     // Split the string on first 200 words and rejoin on spaces
        //     var trimmed = $(this).val().split(/\s+/, 250).join(" ");
        //     // Add a space at the end to keep new typing making new words
        //     $(this).val(trimmed + " ");
        // }
    });

    $('.form-autosize').on('input', function () {
        this.style.width = '60px';
            
        this.style.width = (parseInt((this.scrollWidth)) + parseInt(25))  + 'px';
    });

    $(".btnTransisiSatu").click(function(){
        var first_name = $("[name='first_name']").val();
        var last_name = $("[name='last_name']").val();
        var email = $("[name='email']").val();
        var id_tes = $("[name='id_tes']").val();

        if(first_name == "" || last_name == "" || email == ""){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lengkapi data terlebih dahulu',
            })
        } else {

            // cek email 
            var email = ajax(url_base+"soal/cek_email", "POST", {id_tes: id_tes, email: email});

            if(email == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Email Anda telah digunakan',
                })
            } else {
                $("#login").hide();
                $("#transisi-sesi-1").show();

                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
            }
        }

    })

    $(".btnTransisiDua").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Once you close, you cannot open the previous section',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                clearInterval(countDown);

                $("#soal_tes").hide();
                $("#transisi-sesi-2").show();

                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }

                var audios = document.getElementsByTagName('audio');  
                for(var i = 0, len = audios.length; i < len;i++){  
                    if(audios[i]){  
                        audios[i].pause();  
                    }  
                }
            }
        })
    })

    $(".btnTransisiTiga").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Once you close, you cannot open the previous section',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                clearInterval(countDown);

                $("#soal_tes").hide();
                $("#transisi-sesi-3").show();

                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
            }
        })
    })

    $(".btnListening").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Start the session now?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                $("#transisi-sesi-1").hide();
                $("#soal_tes").show();
                $(".sesi-listening").show();
        
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
        
                // clearInterval(countDown);
                
                sec = 40 * 60;
                // sec = 30;
        
                countDiv = document.getElementById("waktu"),
                secpass,
                countDown = setInterval(function () {
                    'use strict';
                    secpass("sesi-listening");
                }, 1000);
            }
        })
    })

    $(".btnReading").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Start the session now?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                $("#transisi-sesi-2").hide();
                $("#soal_tes").show();
                $(".sesi-listening").hide();
                $(".sesi-reading").show();
        
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
        
                clearInterval(countDown);

                sec = 60 * 60;
                // sec = 40;
        
                countDiv = document.getElementById("waktu"),
                secpass,
                countDown = setInterval(function () {
                    'use strict';
                    secpass("sesi-reading");
                }, 1000);
            }
        })
    })

    $(".btnWriting").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Start the session now?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                $("#transisi-sesi-3").hide();
                $("#soal_tes").show();
                $(".sesi-listening").hide();
                $(".sesi-reading").hide();
                $(".sesi-writing").show();
        
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
        
                clearInterval(countDown);

                sec = 60 * 60;
                // sec = 40;
        
                countDiv = document.getElementById("waktu"),
                secpass,
                countDown = setInterval(function () {
                    'use strict';
                    secpass("sesi-writing");
                }, 1000);
            }
        })
    })

    $(".btnSimpan").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Finish the test?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                swal.fire({
                    html: '<h4>Submit your answer ...</h4>',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });

                $(".btnSimpan").html("Saving...");
                $(".btnSimpan").prop("disabled", true);
                $("#formIelts").submit()
            }
        })
    })

    $('input:radio').click(function () {
        let id = $(this).data("id");
        let value = $(this).val();

        $(`[name="`+id+`"]`).val(value);
    });

    function secpass(id) {
        'use strict';
        var min = Math.floor(sec / 60),
        remSec  = sec % 60;
        if (remSec < 10) {
            remSec = '0' + remSec;
        }
        if (min < 10) {
            min = '0' + min;
        }

        countDiv.innerHTML = min + ":" + remSec;
        if (sec > 0) {
            sec = sec - 1;
        } else {
            if(id == 'sesi-listening'){
                clearInterval(countDown);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Time out',
                    allowOutsideClick: false,
                }).then(function (result) {
                    
                    $("#soal_tes").hide();
                    $("#transisi-sesi-2").show();

                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#elementtoScrollToID").offset().top
                        }, 1000);
                    }
                    
                })
            } else if(id == 'sesi-reading'){
                clearInterval(countDown);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Time out',
                    allowOutsideClick: false,
                }).then(function (result) {
                    
                    $("#soal_tes").hide();
                    $("#transisi-sesi-3").show();

                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#elementtoScrollToID").offset().top
                        }, 1000);
                    }
                    
                })
            } else if(id == 'sesi-writing'){
                clearInterval(countDown);

                // scroll to top 
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }

                swal.fire({
                    title: 'Time out',
                    html: '<h4>Submit your answer ...</h4>',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });

                $(".btnSimpan").html("Saving...");
                $(".btnSimpan").prop("disabled", true);
                $(".btnBack").prop("disabled", true);
                $("#formIelts").submit()
            }
        }
    }

    for (let i = 1; i < 150; i++) {
        // var words = $( ".reading-"+i).first().text().split( /\s+/ );
        var words = $( ".reading-"+i).first().text().split(" ");
        var text = words.join( "</span> <span>" );

        text = text.replace("((i))", "<i>");
        text = text.replace("((/i))", "</i>");

        text = text.replace("((b))", "<b>");
        text = text.replace("((/b))", "</b>");
        
        text = text.replace("((u))", "<u>");
        text = text.replace("((/u))", "</u>");

        text = text.replace("((p))", "<p>");
        text = text.replace("((/p))", "</p>");

        text = text.replace("((br))", "</br>");
        text = text.replace("((hr))", "</hr>");

        for (let z = 0; z < 50; z++) {
            text = text.replace("((i"+z+"))", "<i>");
            text = text.replace("((/i"+z+"))", "</i>");
    
            text = text.replace("((b"+z+"))", "<b>");
            text = text.replace("((/b"+z+"))", "</b>");
            
            text = text.replace("((u"+z+"))", "<u>");
            text = text.replace("((/u"+z+"))", "</u>");
    
            text = text.replace("((p"+z+"))", "<p>");
            text = text.replace("((/p"+z+"))", "</p>");
    
            text = text.replace("((br"+z+"))", "</br>");
            text = text.replace("((hr"+z+"))", "</hr>");
        }

        $( ".reading-"+i ).first().html( "<span>" + text + "</span>" );
    }

    $( "span" ).on( "click", function() {
        $( this ).toggleClass( "highlight" );
        return false;
    });

    // audio
        $('.audio').on('timeupdate', function() {
            let id = $(this).data("id");
            $('#seekbar-'+id).attr("value", this.currentTime / this.duration);
        });

        $(".btnAudio").click(function(){
            id = $(this).data("id");
            $("#audio-"+id)[0].play();
            $(this).hide();
        })

        document.addEventListener('play', function(e){  
            var audios = document.getElementsByTagName('audio');  
            for(var i = 0, len = audios.length; i < len;i++){  
                if(audios[i] != e.target){  
                    audios[i].pause();  
                }  
            }  
        }, true);
    // audio 

    $("textarea").keydown(function(e) {
        if(e.keyCode === 9) { // tab was pressed
            // get caret position/selection
            var start = this.selectionStart;
                end = this.selectionEnd;

            var $this = $(this);

            // set textarea value to: text before caret + tab + text after caret
            $this.val($this.val().substring(0, start)
                        + "\t"
                        + $this.val().substring(end));

            // put caret at right position again
            this.selectionStart = this.selectionEnd = start + 1;

            // prevent the focus lose
            return false;
        }
    });

</script>