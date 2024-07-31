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
                                            <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('assets/myaudio/listening-academic-general-post-test.mp3?t='.time())?>" type="audio/mpeg"></audio>
                                            <progress id="seekbar-1" value="0" max="1" style="width:100%;"></progress><br>
                                            <button class="btn btn-success btnAudio" data-id="1" type="button"><?= tablerIcon("player-play", "")?> play</button>
                                            <p><small class="text-danger"><i>note : The audio can only be played once</i></small></p>
                                        </center>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING POST-TEST ACADEMIC</b></center>
                                        <p class="question">
                                            SECTION 1 | Questions 1-10<br>
                                            Questions 1-10<br>
                                            Complete the table below.<br>
                                            Write NO MORE THAN TWO WORDS AND/OR A NUMBER for each answer.
                                        </p>

                                        <center><span><h3>SHORT STAY ACCOMMODATION</h3></span></center>
                                        <p>
                                            Example:<br>
                                            Family name – <b>Mackinlay</b>
                                        </p>
                                        <center>
                                            <table class="table" style="width:100%">
                                                <tr>
                                                    <td>First name</td>
                                                    <td><b>1)</b> <?= soal_isian_ielts("jawaban_listening[0]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Country of origin</td>
                                                    <td><b>2)</b> <?= soal_isian_ielts("jawaban_listening[1]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of arrival</td>
                                                    <td><b>3)</b> <?= soal_isian_ielts("jawaban_listening[2]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Number of tenants</td>
                                                    <td><b>4)</b> <?= soal_isian_ielts("jawaban_listening[3]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Length of stay</td>
                                                    <td>2 weeks</td>
                                                </tr>
                                                <tr>
                                                    <td>Purpose of visit</td>
                                                    <td><b>5)</b> <?= soal_isian_ielts("jawaban_listening[4]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Type of accommodation</td>
                                                    <td><b>6)</b> <?= soal_isian_ielts("jawaban_listening[5]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Number of bedrooms</td>
                                                    <td>one or two</td>
                                                </tr>
                                                <tr>
                                                    <td>Car parking</td>
                                                    <td>off street and <b>7)</b> <?= soal_isian_ielts("jawaban_listening[6]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Other requirements </td>
                                                    <td>near <b>8)</b> <?= soal_isian_ielts("jawaban_listening[7]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Name of town</td>
                                                    <td><b>9)</b> <?= soal_isian_ielts("jawaban_listening[8]")?> beach</td>
                                                </tr>
                                                <tr>
                                                    <td>Client’s email</td>
                                                    <td>smac13@hotmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td>Price range</td>
                                                    <td>up to <b>10)</b>$ <?= soal_isian_ielts("jawaban_listening[9]")?> a week</td>
                                                </tr>
                                            </table>
                                        </center>
                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION 2 | Questions 11-20<br>
                                            Questions 11-14<br>
                                            Choose the correct letter, A, В оr С.
                                        </p>

                                        <?php
                                            $data_soal_11_14 = [
                                                [ 
                                                    "no" => 11, 
                                                    "soal" => "Refreshments will be served",
                                                    "pilihan" => [
                                                        "<b>A.</b> at the front counter.",
                                                        "<b>B.</b> in the lobby.",
                                                        "<b>C.</b> at the back of the hall.",
                                                    ],
                                                    "name" => "jawaban_listening[10]"
                                                ],
                                                [ 
                                                    "no" => 12, 
                                                    "soal" => "Nick Noble advertised",
                                                    "pilihan" => [
                                                        "<b>A.</b> on the radio.",
                                                        "<b>B.</b> on a billboard.",
                                                        "<b>C.</b> in the newspaper.",
                                                    ],
                                                    "name" => "jawaban_listening[11]"
                                                ],
                                                [ 
                                                    "no" => 13, 
                                                    "soal" => "The original number of founding members was about",
                                                    "pilihan" => [
                                                        "<b>A.</b> 12",
                                                        "<b>B.</b> 20",
                                                        "<b>C.</b> 200",
                                                    ],
                                                    "name" => "jawaban_listening[12]"
                                                ],
                                                [ 
                                                    "no" => 14, 
                                                    "soal" => "The club provides activities primarily for reasonably fit",
                                                    "pilihan" => [
                                                        "<b>A.</b> males up to 75.",
                                                        "<b>B.</b> females with young children.",
                                                        "<b>C.</b> males and females of any age.",
                                                    ],
                                                    "name" => "jawaban_listening[13]"
                                                ],
                                            ];
                                        ?>

                                        <?php foreach ($data_soal_11_14 as $data_soal) :?>
                                            <?= soal_pg_ielts($data_soal)?>
                                        <?php endforeach;?>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 15-20<br>
                                            Complete the table below.<br>
                                            Write NO MORE THAN ONE WORD AND/OR A NUMBER for each answer.
                                        </p>

                                        <center>
                                            <table class="table" style="width:100%">
                                                <tr>
                                                    <th>Activity </th>
                                                    <th>Day(s)</th>
                                                    <th>Duration</th>
                                                    <th>Contact Person</th>
                                                </tr>
                                                <tr>
                                                    <td><b>15)</b><?= soal_isian_ielts("jawaban_listening[14]")?></td>
                                                    <td>Tuesday & Saturday</td>
                                                    <td>About 3-5 hours</td>
                                                    <td>Coordinator</td>
                                                </tr>
                                                <tr>
                                                    <td><b>16)</b> <?= soal_isian_ielts("jawaban_listening[15]")?></td>
                                                    <td>Thursday & Sunday</td>
                                                    <td>Up to 3 hours</td>
                                                    <td><b>17)</b> <?= soal_isian_ielts("jawaban_listening[16]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Wanderers</td>
                                                    <td>Sunday</td>
                                                    <td><b>18)</b> <?= soal_isian_ielts("jawaban_listening[17]")?></td>
                                                    <td>Leader</td>
                                                </tr>
                                                <tr>
                                                    <td><b>19)</b> <?= soal_isian_ielts("jawaban_listening[18]")?> weekends</td>
                                                    <td>Saturday & Sunday</td>
                                                    <td>All weekend</td>
                                                    <td><b>20)</b> <?= soal_isian_ielts("jawaban_listening[19]")?></td>
                                                </tr>
                                            </table>
                                        </center>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 21-26<br>
                                            Complete the notes below.<br>
                                            Write NO MORE THAN TWO WORDS for each answer.
                                        </p>
                                        <center><h3>“Globalisation and Educational Change”</h3></center>
                                        <p>
                                            GEC 692 New Code: <b>21)</b> <?= soal_isian_ielts("jawaban_listening[20]")?>
                                            Aims – Analysis of educational problems arising from globalisation
                                        </p>

                                        <p>
                                            Chance to research and <b>22)</b> <?= soal_isian_ielts("jawaban_listening[21]")?> progress of educational change
                                            Investigate influence of culture and <b>23)</b> <?= soal_isian_ielts("jawaban_listening[22]")?> on education
                                            Argue advantages and disadvantages of reorganisation of public education in own country with regard to globalisation
                                        </p>

                                        <p>
                                            Consider the <b>24)</b> <?= soal_isian_ielts("jawaban_listening[23]")?> of globalisation on diversity of national curricula across richer and poorer countries<br>
                                            Assignment #l = Power Point Presentation (ungraded) + <b>25)</b> Written Review (<?= soal_isian_ielts("jawaban_listening[24]")?>)
                                            Assignment #2 = take part in Seminar (2O%) + <b>26)</b> <?= soal_isian_ielts("jawaban_listening[25]")?>_ (50%)
                                        </p>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 27-30<br>
                                            Complete the table below.<br>
                                            Write NO MORE THAN TWO WORDS AND/OR A NUMBER for each answer.
                                        </p>
                                        
                                        <center>
                                            <table class="table" style="width:100%">
                                                <tr>
                                                    <td>Author</td>
                                                    <td>Title</td>
                                                    <td>Date</td>
                                                </tr>
                                                <tr>
                                                    <td><b>27)</b> <?= soal_isian_ielts("jawaban_listening[26]")?></td>
                                                    <td>Comparative Education</td>
                                                    <td>2007</td>
                                                </tr>
                                                <tr>
                                                    <td>Elliot</td>
                                                    <td>Educational Issues of the New Millenium</td>
                                                    <td><b>28)</b> <?= soal_isian_ielts("jawaban_listening[27]")?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>29)</b> <?= soal_isian_ielts("jawaban_listening[28]")?></td>
                                                    <td>Education and Globalisation</td>
                                                    <td>2009</td>
                                                </tr>
                                                <tr>
                                                    <td>York</td>
                                                    <td>Globalisation and <b>30)</b> <?= soal_isian_ielts("jawaban_listening[29]")?></td>
                                                    <td>2010</td>
                                                </tr>
                                            </table>
                                        </center>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION 3 | Questions 31-40<br>
                                            Questions 31-40<br>
                                            Complete the summary below<br>
                                            Write NO MORE THAN TWO WORDS for each answer
                                        </p>
                                        <p>Every day the human body is fighting off <b>31)</b> <?= soal_isian_ielts("jawaban_listening[30]")?> by destructive pathogens. A person in good health has natural protection in the form of an immune system which works best against familiar microorganisms which may have been encountered during a previous <b>32)</b> <?= soal_isian_ielts("jawaban_listening[31]")?> or passed on by the mother before or after birth.</p>
                                        <p>Vaccination is a way to cause <b>33)</b> <?= soal_isian_ielts("jawaban_listening[32]")?> immunisation by introducing a small amount of pathogen into the body – just enough for the body’s <b>34)</b> <?= soal_isian_ielts("jawaban_listening[33]")?> to react by making antibodies. Passive immunisation can be used as a way of treating someone who is already sick. Proteins from animal <b>35)</b> <?= soal_isian_ielts("jawaban_listening[34]")?> are introduced into the patient to give him the necessary antibodies to fight the disease.</p>
                                        <p>Dr. Edward Jenner observed that people who had suffered and recovered from a serious disease called smallpox did not get it again. He also noted that victims of a milder disease, cowpox, which they caught from <b>36)</b> <?= soal_isian_ielts("jawaban_listening[35]")?>, were immune to smallpox. He carried out a successful <b>37)</b> <?= soal_isian_ielts("jawaban_listening[36]")?> by deliberately giving a child cowpox in order to make him immune to smallpox. Antibodies are produced by micro-organisms to fight bacterial <b>38)</b> <?= soal_isian_ielts("jawaban_listening[37]")?>. Y-shaped antibodies can prevent antigens and repair the <b>39)</b> <?= soal_isian_ielts("jawaban_listening[38]")?>. The agglutination can be seen by <b>40)</b> <?= soal_isian_ielts("jawaban_listening[39]")?> eyes to determine patient’s condition. </p>
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
                                        <p><center><h3>How to Choose your Builder</h3></center></p>
                                        <div class='reading-1'>
                                            ((p1))Building a new home is a significant investment, and it’s essential to find the right builder for the job. Before you look for a builder, it’s important to develop a comprehensive budget and have clear plans. Once you have a design in mind, it is time to start narrowing down your builder shortlist, and this starts with assessing how qualified each builder is. In Australia, this means checking that the builder holds a residential building license. Most states have their own building authority who you can contact to check a builder’s license.((/p1))
                                            ((p2))You can also check if the builder is a member of an industry association such as the Housing Industry Association (HIA), and whether they have won any industry awards. For instance, the HIA runs a state and national awards programme, with a category that recognises the level of customer service that a builder delivers.((/p2))
                                            ((p3))Most experts agree that display homes (homes constructed by the builder that are open to the public) offer a great opportunity to study their work up close. Display homes are usually offered by major project builders who work on a large scale and can deliver good quality and value. You can also talk to the salesperson and find out about the home design and what is and isn’t included in the sale price. And it may be possible to talk to other customers you meet there and ask their opinion of the workmanship in the display home.((/p3))
                                            ((p4))Finally, avoid signing any business contract before you have read and understood it thoroughly. Ask your builder to use a standard building contract that has been designed to comply with the Domestic Building Contracts Act, and to be fair to both client and builder. You have five business days within which you may withdraw from the contract after signing it.  ((/p4))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION ONE | QUESTIONS 1-13<br>
                                            PASSAGE ONE (Questions 1-7)<br>
                                            You should spend about 20 minutes on Questions 1-7 which are based on Reading Passage 1 below.
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
                                                            QUESTIONS 1-7  <br>
                                                            Do the following statements agree with the information given in the text above? Write your answers on the answer sheet.
                                                        </p>
                                                        <p>
                                                            <b>TRUE</b> if the statement agrees with the information <br>
                                                            <b>FALSE</b> if the statement contradicts the information <br>
                                                            <b>NOT GIVEN</b> if there is no information on this
                                                        </p>

                                                        <?php
                                                            $data_soal_1_7 = [
                                                                [ 
                                                                    "no" => 1, 
                                                                    "soal" => "After selecting a builder, you should decide on the design of your new house.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[0]"
                                                                ],
                                                                [ 
                                                                    "no" => 2, 
                                                                    "soal" => "In Australia, you can make sure that a builder has the appropriate license.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[1]"
                                                                ],
                                                                [ 
                                                                    "no" => 3, 
                                                                    "soal" => "The best builders usually belong to the Housing Industry Association.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[2]"
                                                                ],
                                                                [ 
                                                                    "no" => 4, 
                                                                    "soal" => "The HIA gives an award to builders whose standards of customer service are very high.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[3]"
                                                                ],
                                                                [ 
                                                                    "no" => 5, 
                                                                    "soal" => "Builders who work on smaller projects are more likely to have display homes.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[4]"
                                                                ],
                                                                [ 
                                                                    "no" => 6, 
                                                                    "soal" => "It is advisable to have a contract which is in accordance with the Domestic Building Contracts Act.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[5]"
                                                                ],
                                                                [ 
                                                                    "no" => 7, 
                                                                    "soal" => "A contract is legally binding from the time it has been signed",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[6]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_1_7 as $data_soal) :?>
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
                                        <p><center><h3>Island Adventure Activities</h3></center></p>
                                        <div class='reading-2'>
                                            ((p1))
                                                ((b1))A. Rib riding((/b1))((br1))
                                                Conquer stormy seas on a high-speed ride in an RIB (Rigid Inﬂatable Boat ). These powerful boats cut through choppy waters with ease. You’ll need to hold on tight as the boat bounces across the wake of awesome cruise liners in one of the world’s busiest shipping lanes. B Horse riding Experience the thrill of riding on horseback along peaceful country lanes and secluded bridleways with the help of expert guides. Even a novice can quickly take the reins and feel the thrill of riding one of nature’s most magniﬁcent beasts.
                                            ((/p1))
                                            ((p2))
                                                ((b2))B. Horse riding((/b2))((br2))
                                                Horse riding Experience the thrill of riding on horseback along peaceful country lanes and secluded bridleways with the help of expert guides. Even a novice can quickly take the reins and feel the thrill of riding one of nature’s most magnificent beasts. 
                                            ((/p2))
                                            ((p3))
                                                ((b3))C. Kayaking((/b3))((br3))
                                                Test your kayak nerves paddling around a deserted military fort built on a rocky outcrop out at sea, then explore the island’s busy harbors before gliding back to dry land where a hot shower and a cup of tea await.
                                            ((/p3))
                                            ((p4))
                                                ((b4))D. Cycling((/b4))((br4))
                                                Test your endurance on the famous Round the Island Cycle Route. Grit your teeth and tackle the brutal hills in the south of the island, or for something less challenging, discover our car-free cycle tracks on former railway lines.
                                            ((/p4))
                                            ((p5))
                                                ((b5))E. Segway riding((/b5))((br5))
                                                Have you got what it takes to master a Segway? In theory, these quirky electric machines are simple to control, with users leaning forwards to go faster and back to slow down. In reality, you’ll need some practice before you can master the skill and glide around the island.
                                            ((/p5))
                                            ((p6))
                                                ((b6))F. Tree climbing((/b6))((br6))
                                                A climb into the canopy of a 25-metre oak tree is an amazing experience. Supported by a rope and harness, you can stand on branches no bigger than your wrist, and swing out between the boughs, or simply take the opportunity to lie in a tree-top hammock and absorb the stunning bird’s eye views.
                                            ((/p6))
                                            ((p7))
                                                ((b7))G. Coasteerin((/b7))((br7))
                                                Tackle the spectacular coast in the north of the island. Scrabble over the rocks around cliff edges as the waves crash around you, dive through submerged caves and emerge onto a beach once used by smugglers. This is a thrilling experience, but not an adventure to attempt alone.
                                            ((/p7))
                                            ((p8))
                                                ((b8))H. Mountain boarding((/b8))((br8))
                                                First developed as an off-season alternative to winter sports and now a sport in its own right, mountain boarding has the speed of snowboarding but with a harder landing when you fall. After a bit of practice and a few bruises, you’ll learn to control the ride and can join the few people who can call themselves mountain boarders.
                                            ((/p8))
                                        </div>
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
                                                            QUESTIONS 8-14<br>
                                                            Look at the eight advertisements for adventure sports on an island, A- H on the text above. For which adventure sport are the following statements true? <br>
                                                            Write the correct letter, A- H, in boxes 8-14 on your answer sheet. <br>
                                                            NB You may use any letter more than once. 
                                                        </p>
                                                        
                                                        <p><b>8.</b> You will be provided with safety equipment. <?= soal_isian_ielts("jawaban_reading[7]")?></p>
                                                        <p><b>9.</b> You may get some minor injuries doing this activity  <?= soal_isian_ielts("jawaban_reading[8]")?></p>
                                                        <p><b>10.</b> You can see a disused, isolated building <?= soal_isian_ielts("jawaban_reading[9]")?></p>
                                                        <p><b>11.</b> You can relax and look down from above in an unusual location. <?= soal_isian_ielts("jawaban_reading[10]")?></p>
                                                        <p><b>12.</b> You will take an exciting trip in rough water close to big ships. <?= soal_isian_ielts("jawaban_reading[11]")?></p>
                                                        <p><b>13.</b> You can choose easy options or more diﬃcult ones. <?= soal_isian_ielts("jawaban_reading[12]")?></p>
                                                        <p><b>14.</b> You may ﬁnd this more diﬃcult than you expect. <?= soal_isian_ielts("jawaban_reading[13]")?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>Barrington Music Service: <br> Business and Development Manager</h3></center></p>
                                        <div class='reading-3'>
                                            ((p1))Barrington Music Service organises a wide range of music activities for children and young people resident in and around Barrington. It provides singing and specialist instrumental lessons in schools, and it owns a collection of instruments for use in schools, some of which are available for hire by the parents of children having lessons. The Service also arranges a number of music-related events, including festivals bringing together choirs and soloists from schools in both Barrington and other areas. The Music Service provides administrative and financial support for the Barrington Youth Orchestra, which takes part in workshops with professional artists and gives performances. ((/p1))
                                            ((p2))Barrington Music Service is seeking to recruit a Business and Development Manager to manage the administrative function and build on the success of the Service. We are looking for an individual with a passion for delivering the best possible music provision for the benefit of our children and young people. ((/p2))
                                            ((p3))As the Business and Development Manager, you will be responsible for managing the administrative and financial systems of the Music Service, ensuring it does not exceed its budget, which is currently around £1m a year. You will take the lead on marketing the Service and ensuring the generation of new income. The Music Service is involved in several partnerships with schools and with music and community organisations in the district, and you will be expected to increase the number and scope of these, as well as take the lead in fundraising. The Service recently embarked on a programme to broaden what is taught in school music lessons, to include instruments and musical styles from around the world, and you will be required to further develop this emphasis on diversity. ((/p3))
                                            ((p4))You will need to improve systems for ensuring that the records of the Service’s activities are accurate and maintain a database of all music teachers, students, and instruments belonging to the Service. ((/p4))
                                            ((p5))The person appointed will have experience of a supervisory role and the skills to motivate members of a team. You will have an understanding of accounting, at a non-specialist level, and of standard financial procedures. High-level IT skills and excellent verbal and written communication skills are essential. Although experience in music education is not crucial, good knowledge of the eld, or of other areas of arts management, would be an advantage.    ((/p5))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION TWO | QUESTIONS 15-27<br>
                                            PASSAGE THREE (Questions 15-20)
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
                                                            QUESTIONS 15-20<br>
                                                            Complete the notes below.<br>
                                                            Choose ONE WORD ONLY from the text for each answer. <br>
                                                            Write your answers in boxes 15-20 on your answer sheet.
                                                        </p>

                                                        <p><center><u>Barrington Music Service Activities</u></center></p>
                                                        <p><u>Activities</u></p>
                                                        <ul type="radio">
                                                            <li>organises music lessons </li>
                                                            <li>enables the hire of instruments </li>
                                                            <li>Events such as 15 <?= soal_isian_ielts("jawaban_reading[14]")?> for local and visiting schools </li>
                                                            <li>supports Barrington Youth Orchestra</li>
                                                        </ul>

                                                        <p>
                                                            <b>Post of Business and Development Manager</b><br>
                                                            <i>Person appointed will...</i>
                                                        </p>
                                                        <ul type="radio">
                                                            <li>manage the administration of the Service </li>
                                                            <li>be responsible for keeping to the <b>16)</b> <?= soal_isian_ielts("jawaban_reading[15]")?> </li>
                                                            <li>build <b>17)</b><?= soal_isian_ielts("jawaban_reading[16]")?>. with other organisations </li>
                                                            <li>be proactive in fundraising </li>
                                                            <li>increase the focus on <b>18)</b> <?= soal_isian_ielts("jawaban_reading[17]")?> in school music lessons (e.g., international styles) </li>
                                                            <li>make sure records and a <b>19)</b> <?= soal_isian_ielts("jawaban_reading[18]")?>. is kept up-to-date</li>
                                                        </ul>

                                                        <p><b>Person appointed must have</b></p>
                                                        <ul type="radio">
                                                            <li>ability to supervise and motivate others </li>
                                                            <li>basic knowledge of <b>20)</b> <?= soal_isian_ielts("jawaban_reading[19]")?></li>
                                                            <li>other relevant skills</li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>Health and Safety in Small Businesses</h3></center></p>
                                        <div class='reading-4'>
                                            ((p1))The rate of accidents at work is almost 75% higher in small businesses than in larger companies. One possible reason is chat many managers of small businesses have an inadequate knowledge of health and safety issues.((/p1))
                                            ((p2))Many managers of small businesses claim their situation is made worse by bureaucracy, arguing that the huge number of regulations – not just on health and safety but also on tax, the minimum wage, and much, much more – makes their work difficult.((/p2))
                                            ((p3))Many managers are simply not aware of their responsibilities. They are too busy running their companies to read manuals, employ consultants or go to seminars. Moreover, the average business person doesn’t know where and how to get information.((/p3))
                                            ((p4))The Federation of Small Businesses argues that the special nature of small businesses should be recognised by health and safety inspectors, with an emphasis on education and how to comply with the law, rather than simply on enforcement. For instance, inspectors could make employers aware of what they really need to know, rather than swamping them with mountains of leaflets which may not be relevant.((/p4))
                                            ((p5))Improvements are being made, however. The Health and Safety Executive has issued a free guide to the most important health and safety laws for employers. All employers must have their own health and safety policy statement and, for businesses with more than five employees, this must be in writing. It should be specific to the business and clear about the arrangements for and organisation of health and safety at work.((/p5))
                                            ((p6))We should state a strategy, detail how it will be implemented and by whom, and say when it will be reviewed and updated. It is advisable to involve employees in this process, as they have direct experience.((/p6))
                                            ((p7))Assessing and identifying risks is the starting point. But to comply with the law, businesses must train their employees about health and safety, and provide information to others who need to know, such as the contractors working for them. These are often smaller companies that carry out most of the dangerous work. Helping them to get into good safety habits makes it easier for them to tender for work from big companies.((/p7))
                                            ((p8))Other advice from the Health and Safety Executive for small businesses tackles specific issues, such as helping small companies to deal with work-related stress.((/p8))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PASSAGE FOUR (Questions 21-27)<br>
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
                                                            QUESTIONS 21-27<br>
                                                            Complete the sentences below. Choose ONE WORD ONLY from the text for each answer. <br>
                                                            Write your answers in boxes 21-27 on your reading answer sheet.
                                                        </p>

                                                        <p><b>21.</b> One cause of health and safety problems in small businesses is that managers do not have enough relevant <?= soal_isian_ielts("jawaban_reading[20]")?></p>
                                                        <p><b>22.</b> Managers complain they have too many <?= soal_isian_ielts("jawaban_reading[21]")?> to deal with.</p>
                                                        <p><b>23.</b> Managers may not fully understand their <?= soal_isian_ielts("jawaban_reading[22]")?></p>
                                                        <p><b>24.</b> Businesses sometimes feel that inspectors give them far too many <?= soal_isian_ielts("jawaban_reading[23]")?></p>
                                                        <p><b>25.</b> Businesses above a certain size must produce a written <?= soal_isian_ielts("jawaban_reading[24]")?> of their health and safety policy.</p>
                                                        <p><b>26.</b> A company’s health and safety policy is relevant to both its employees and its <?= soal_isian_ielts("jawaban_reading[25]")?></p>
                                                        <p><b>27.</b> The Health and Safety Executive can advise small businesses on problems of <?= soal_isian_ielts("jawaban_reading[26]")?> among their employees</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>Jobs in Ancient Egypt</h3></center></p>
                                        <div class='reading-4'>
                                            ((p1))In order to be engaged in the higher professions in ancient Egypt, a person had co be literate and so ﬁrst had to become a scribe. The apprenticeship for this job lasted many years and was tough and challenging. It principally involved memorizing hieroglyphic symbols and practicing handwritten lettering. Scribes noted the everyday activities in ancient Egypt and wrote about everything from grain stocks to tax records. Therefore, most of our information on this rich culture comes from their records. Most scribes were men from privileged backgrounds. The occupation of scribe was among the most sought-after in ancient Egypt. Craftspeople endeavored to get their sons into the school for scribes, but they were rarely successful. As in many civilizations, the lower classes provided the means for those above them to live comfortable lives. You needed to work if you wanted to eat, but there was no shortage of jobs at any time in Egypt’s history. The commonplace items taken for granted today, such as a brush or bowl, had to be made by hand; laundry had to be washed by hand, clothing sewn, and sandals made from papyrus and palm leaves. In order to make these and have paper to write on, papyrus plants had to be harvested, processed and distributed and all these jobs needed workers. There were rewards and sometimes diﬃculties. The reed cutter, for example, who harvested papyrus plants along the Nile, had to bear in mind that he worked in an area that was also home to wildlife that, at times, could prove fatal.((/p1))
                                            ((p2))At the bottom rung of all these jobs were the people who served as the basis for the entire economy: the farmers. Farmers usually did not own the land they worked. They were given food, implements, and living quarters as payment for their labor. Although there were many more glamorous jobs than farming, farmers were the backbone of the Egyptian economy and sustained everyone else.((/p2))
                                            ((p3))The details of lower-class jobs are known from medical reports on the treatment of injuries, letters, and documents written on various professions, literary works, tomb inscriptions, and artistic representations. This evidence presents a comprehensive view of daily work in ancient Egypt – how the jobs were done, and sometimes how people felt about the work. In general, the Egyptians seem to have felt pride in their work no matter what their occupation. Everyone had something to contribute to the community, and no skills seem to have been considered non-essential. The potter who produced cups and bowls was as important to the community as the scribe, and the amulet-maker as vital as the pharmacist.((/p3))
                                            ((p4))Part of making a living, regardless of one’s special skills, was taking part in the king’s monumental building projects. Although it is commonly believed that the great monuments and temples of Egypt were achieved through slave labor, there is absolutely no evidence to support this. The pyramids and other monuments were built by Egyptian laborers who either donated their time as community service or were paid for their labor, and Egyptians from every occupation could be called on to do this.((/p4))
                                            ((p5))Stone had to ﬁrst be quarried and chis required workers to split the blocks from the rock cliffs. It was done by inserting wooden wedges in the rock which would swell and cause the stone to break from the face. The often huge blocks were then pushed onto sleds, devices better suited than wheeled vehicles to moving weighty objects over shifting sand. They were then rolled to a different location where they could be cut and shaped. This job was done by skilled stonemasons working with copper chisels and wooden mallets. As the chisels could gee blunt, a specialist in sharpening would take the tool, sharpen it, and bring it back. This would have been constant daily work as the masons could wear down their tools on a single block.((/p5))
                                            ((p6))The blocks were then moved into position by unskilled laborers. These people were mostly farmers who could do nothing with their land during the months when the Nile River overﬂowed its banks. Egyptologists Bob Brier and Hoyt Hobbs explain: ‘For two months annually, workmen gathered by the tells of thousands from all over the country to transport the blocks a permanent crew had quarried during the rest of the year. Overseers organized the men into teams to transport the stones on the sleds.’ Once the pyramid was complete, the inner chambers needed to be decorated by scribes who painted elaborate images on the walls. Interior work on tombs and temples also required sculptors who could expertly cut away the stone around certain ﬁgures or scenes that had been painted.((/p6))
                                            ((p7))While these artists were highly skilled, everyone – no matter what their job for the rest of the year – was expected to contribute to communal projects. This practice was in keeping with the value of ma’at (harmony and balance) which was central to Egyptian culture. One was expected to care for others as much as oneself and contributing to the common good was an expression of this. There is no doubt there were many people who did not love their job every day, but the Egyptian government was aware of how hard the people worked and so staged a number of festivals throughout the year to show gratitude and give them days off to relax.((/p7))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION THREE | QUESTIONS 28-40<br>
                                            PASSAGE FIVE (Questions 28-40)<br>
                                            You should spend about 20 minutes on Questions 28-40 which are based on Reading Passage Five below).
                                        </p>
                                        <p class="question">
                                            Write answers to questions in boxes 28-40 on your answer sheet.<br>
                                            Read the text below and answer Questions 28-40
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
                                                            Questions 28-32<br>
                                                            Choose the correct letter, A, B, C or D.<br>
                                                            Write the correct letter in boxes 28-32 on your answer sheet.
                                                        </p>
                                                        
                                                        <?php
                                                            $data_soal_28_32 = [
                                                                [ 
                                                                    "no" => 28, 
                                                                    "soal" => "What does the writer say about scribes in ancient Egypt?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> Their working days were very long.",
                                                                        "<b>B.</b> The topics they wrote about were very varied.",
                                                                        "<b>C.</b> Many of them were once ordinary working people.",
                                                                        "<b>D.</b> Few of them realized, the true value of their occupation.",
                                                                    ],
                                                                    "name" => "jawaban_reading[27]"
                                                                ],
                                                                [ 
                                                                    "no" => 29, 
                                                                    "soal" => "What is the writer doing in the second paragraph?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> explaining why jobs were plentiful in ancient Egypt",
                                                                        "<b>B.</b> pointing out how honest workers were in ancient Egypt",
                                                                        "<b>C.</b> comparing manual and professional work in ancient Egypt",
                                                                        "<b>D.</b> noting the range of duties an individual worker had in ancient Egypt",
                                                                    ],
                                                                    "name" => "jawaban_reading[28]"
                                                                ],
                                                                [ 
                                                                    "no" => 30, 
                                                                    "soal" => "What is the writer doing in the ﬁfth paragraph?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> explaining a problem",
                                                                        "<b>B.</b> describing a change",
                                                                        "<b>C.</b> rejecting a popular view",
                                                                        "<b>D.</b> criticizing a past activity",
                                                                    ],
                                                                    "name" => "jawaban_reading[29]"
                                                                ],
                                                                [ 
                                                                    "no" => 31, 
                                                                    "soal" => "The writer refers to the value of ma’at in order to explain",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> how the work of artists reﬂected beliefs in ancient Egypt.",
                                                                        "<b>B.</b> how ancient Egyptians viewed their role in society.",
                                                                        "<b>C.</b> why the opinions of certain people were valued in ancient Egypt.",
                                                                        "<b>D.</b> why ancient Egyptians expressed their views so readily.",
                                                                    ],
                                                                    "name" => "jawaban_reading[30]"
                                                                ],
                                                                [ 
                                                                    "no" => 32, 
                                                                    "soal" => "Which word best describes the attitude of the Egyptian government toward its workers?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> strict",
                                                                        "<b>B.</b> patient ",
                                                                        "<b>C.</b> negligent",
                                                                        "<b>D.</b> appreciative",
                                                                    ],
                                                                    "name" => "jawaban_reading[31]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_28_32 as $data_soal) :?>
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
                                        <p><center><h3>Jobs in Ancient Egypt</h3></center></p>
                                        <div class='reading-5'>
                                            ((p1))In order to be engaged in the higher professions in ancient Egypt, a person had co be literate and so ﬁrst had to become a scribe. The apprenticeship for this job lasted many years and was tough and challenging. It principally involved memorizing hieroglyphic symbols and practicing handwritten lettering. Scribes noted the everyday activities in ancient Egypt and wrote about everything from grain stocks to tax records. Therefore, most of our information on this rich culture comes from their records. Most scribes were men from privileged backgrounds. The occupation of scribe was among the most sought-after in ancient Egypt. Craftspeople endeavored to get their sons into the school for scribes, but they were rarely successful. As in many civilizations, the lower classes provided the means for those above them to live comfortable lives. You needed to work if you wanted to eat, but there was no shortage of jobs at any time in Egypt’s history. The commonplace items taken for granted today, such as a brush or bowl, had to be made by hand; laundry had to be washed by hand, clothing sewn, and sandals made from papyrus and palm leaves. In order to make these and have paper to write on, papyrus plants had to be harvested, processed and distributed and all these jobs needed workers. There were rewards and sometimes diﬃculties. The reed cutter, for example, who harvested papyrus plants along the Nile, had to bear in mind that he worked in an area that was also home to wildlife that, at times, could prove fatal.((/p1))
                                            ((p2))At the bottom rung of all these jobs were the people who served as the basis for the entire economy: the farmers. Farmers usually did not own the land they worked. They were given food, implements, and living quarters as payment for their labor. Although there were many more glamorous jobs than farming, farmers were the backbone of the Egyptian economy and sustained everyone else.((/p2))
                                            ((p3))The details of lower-class jobs are known from medical reports on the treatment of injuries, letters, and documents written on various professions, literary works, tomb inscriptions, and artistic representations. This evidence presents a comprehensive view of daily work in ancient Egypt – how the jobs were done, and sometimes how people felt about the work. In general, the Egyptians seem to have felt pride in their work no matter what their occupation. Everyone had something to contribute to the community, and no skills seem to have been considered non-essential. The potter who produced cups and bowls was as important to the community as the scribe, and the amulet-maker as vital as the pharmacist.((/p3))
                                            ((p4))Part of making a living, regardless of one’s special skills, was taking part in the king’s monumental building projects. Although it is commonly believed that the great monuments and temples of Egypt were achieved through slave labor, there is absolutely no evidence to support this. The pyramids and other monuments were built by Egyptian laborers who either donated their time as community service or were paid for their labor, and Egyptians from every occupation could be called on to do this.((/p4))
                                            ((p5))Stone had to ﬁrst be quarried and chis required workers to split the blocks from the rock cliffs. It was done by inserting wooden wedges in the rock which would swell and cause the stone to break from the face. The often huge blocks were then pushed onto sleds, devices better suited than wheeled vehicles to moving weighty objects over shifting sand. They were then rolled to a different location where they could be cut and shaped. This job was done by skilled stonemasons working with copper chisels and wooden mallets. As the chisels could gee blunt, a specialist in sharpening would take the tool, sharpen it, and bring it back. This would have been constant daily work as the masons could wear down their tools on a single block.((/p5))
                                            ((p6))The blocks were then moved into position by unskilled laborers. These people were mostly farmers who could do nothing with their land during the months when the Nile River overﬂowed its banks. Egyptologists Bob Brier and Hoyt Hobbs explain: ‘For two months annually, workmen gathered by the tells of thousands from all over the country to transport the blocks a permanent crew had quarried during the rest of the year. Overseers organized the men into teams to transport the stones on the sleds.’ Once the pyramid was complete, the inner chambers needed to be decorated by scribes who painted elaborate images on the walls. Interior work on tombs and temples also required sculptors who could expertly cut away the stone around certain ﬁgures or scenes that had been painted.((/p6))
                                            ((p7))While these artists were highly skilled, everyone – no matter what their job for the rest of the year – was expected to contribute to communal projects. This practice was in keeping with the value of ma’at (harmony and balance) which was central to Egyptian culture. One was expected to care for others as much as oneself and contributing to the common good was an expression of this. There is no doubt there were many people who did not love their job every day, but the Egyptian government was aware of how hard the people worked and so staged a number of festivals throughout the year to show gratitude and give them days off to relax.((/p7))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION THREE | QUESTIONS 28-40<br>
                                            PASSAGE FIVE (Questions 28-40)<br>
                                            You should spend about 20 minutes on Questions 28-40 which are based on Reading Passage Five below).
                                        </p>
                                        <p class="question">
                                            Write answers to questions in boxes 28-40 on your answer sheet.<br>
                                            Read the text below and answer Questions 28-40
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
                                                            Questions 33-36<br>
                                                            Look at the following statements (Questions 33-36) and the list of jobs below. Match each statement with the correct job, A- G.
                                                        </p>

                                                        <p class="question">
                                                            Write the correct letter, A- G, in boxes 33- 36 on your answer sheet.
                                                        </p>
                                                        
                                                        <table class="table">
                                                            <tr>
                                                                <td>
                                                                    List of Jobs
                                                                </td>
                                                                <td>
                                                                    <b>A.</b> scribe
                                                                    <b>B.</b> reed cutter
                                                                    <b>C.</b> farmer
                                                                    <b>D.</b> potter
                                                                    <b>E.</b> stonemason
                                                                    <b>F.</b> overseer
                                                                    <b>G.</b> sculptor
                                                                </td>
                                                            </tr>
                                                        </table>

                                                        <p><b>33.</b> was unable to work at certain times <?= soal_isian_ielts("jawaban_reading[32]")?></p>
                                                        <p><b>34.</b> divided workers into groups <?= soal_isian_ielts("jawaban_reading[33]")?></p>
                                                        <p><b>35.</b> faced daily hazards <?= soal_isian_ielts("jawaban_reading[34]")?></p>
                                                        <p><b>36.</b> underwent a long period of training <?= soal_isian_ielts("jawaban_reading[35]")?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>Jobs in Ancient Egypt</h3></center></p>
                                        <div class='reading-6'>
                                            ((p1))In order to be engaged in the higher professions in ancient Egypt, a person had co be literate and so ﬁrst had to become a scribe. The apprenticeship for this job lasted many years and was tough and challenging. It principally involved memorizing hieroglyphic symbols and practicing handwritten lettering. Scribes noted the everyday activities in ancient Egypt and wrote about everything from grain stocks to tax records. Therefore, most of our information on this rich culture comes from their records. Most scribes were men from privileged backgrounds. The occupation of scribe was among the most sought-after in ancient Egypt. Craftspeople endeavored to get their sons into the school for scribes, but they were rarely successful. As in many civilizations, the lower classes provided the means for those above them to live comfortable lives. You needed to work if you wanted to eat, but there was no shortage of jobs at any time in Egypt’s history. The commonplace items taken for granted today, such as a brush or bowl, had to be made by hand; laundry had to be washed by hand, clothing sewn, and sandals made from papyrus and palm leaves. In order to make these and have paper to write on, papyrus plants had to be harvested, processed and distributed and all these jobs needed workers. There were rewards and sometimes diﬃculties. The reed cutter, for example, who harvested papyrus plants along the Nile, had to bear in mind that he worked in an area that was also home to wildlife that, at times, could prove fatal.((/p1))
                                            ((p2))At the bottom rung of all these jobs were the people who served as the basis for the entire economy: the farmers. Farmers usually did not own the land they worked. They were given food, implements, and living quarters as payment for their labor. Although there were many more glamorous jobs than farming, farmers were the backbone of the Egyptian economy and sustained everyone else.((/p2))
                                            ((p3))The details of lower-class jobs are known from medical reports on the treatment of injuries, letters, and documents written on various professions, literary works, tomb inscriptions, and artistic representations. This evidence presents a comprehensive view of daily work in ancient Egypt – how the jobs were done, and sometimes how people felt about the work. In general, the Egyptians seem to have felt pride in their work no matter what their occupation. Everyone had something to contribute to the community, and no skills seem to have been considered non-essential. The potter who produced cups and bowls was as important to the community as the scribe, and the amulet-maker as vital as the pharmacist.((/p3))
                                            ((p4))Part of making a living, regardless of one’s special skills, was taking part in the king’s monumental building projects. Although it is commonly believed that the great monuments and temples of Egypt were achieved through slave labor, there is absolutely no evidence to support this. The pyramids and other monuments were built by Egyptian laborers who either donated their time as community service or were paid for their labor, and Egyptians from every occupation could be called on to do this.((/p4))
                                            ((p5))Stone had to ﬁrst be quarried and chis required workers to split the blocks from the rock cliffs. It was done by inserting wooden wedges in the rock which would swell and cause the stone to break from the face. The often huge blocks were then pushed onto sleds, devices better suited than wheeled vehicles to moving weighty objects over shifting sand. They were then rolled to a different location where they could be cut and shaped. This job was done by skilled stonemasons working with copper chisels and wooden mallets. As the chisels could gee blunt, a specialist in sharpening would take the tool, sharpen it, and bring it back. This would have been constant daily work as the masons could wear down their tools on a single block.((/p5))
                                            ((p6))The blocks were then moved into position by unskilled laborers. These people were mostly farmers who could do nothing with their land during the months when the Nile River overﬂowed its banks. Egyptologists Bob Brier and Hoyt Hobbs explain: ‘For two months annually, workmen gathered by the tells of thousands from all over the country to transport the blocks a permanent crew had quarried during the rest of the year. Overseers organized the men into teams to transport the stones on the sleds.’ Once the pyramid was complete, the inner chambers needed to be decorated by scribes who painted elaborate images on the walls. Interior work on tombs and temples also required sculptors who could expertly cut away the stone around certain ﬁgures or scenes that had been painted.((/p6))
                                            ((p7))While these artists were highly skilled, everyone – no matter what their job for the rest of the year – was expected to contribute to communal projects. This practice was in keeping with the value of ma’at (harmony and balance) which was central to Egyptian culture. One was expected to care for others as much as oneself and contributing to the common good was an expression of this. There is no doubt there were many people who did not love their job every day, but the Egyptian government was aware of how hard the people worked and so staged a number of festivals throughout the year to show gratitude and give them days off to relax.((/p7))
                                        </div>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION THREE | QUESTIONS 28-40<br>
                                            PASSAGE FIVE (Questions 28-40)<br>
                                            You should spend about 20 minutes on Questions 28-40 which are based on Reading Passage Five below).
                                        </p>
                                        <p class="question">
                                            Write answers to questions in boxes 28-40 on your answer sheet.<br>
                                            Read the text below and answer Questions 28-40
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
                                                            Questions 37-40<br>
                                                            Complete the summary below.
                                                        </p>
                                                        
                                                        <p class="question">
                                                            Choose NO MORE THAN TWO WORDS from the text for each answer. <br>
                                                            Write your answers in boxes 37- 40 on your answer sheet.
                                                        </p>

                                                        <p><center><b>The King’s Building Projects</b></center></p>
                                                        <p>Labourers who worked on the king’s buildings were local people who chose to participate in <b>37)</b> <?= soal_isian_ielts("jawaban_reading[36]")?> or who received payment.</p>
                                                        <p>The work involved breaking up stone cliffs using wooden wedges. The large pieces of stone were then transported to another site on sleds, which moved easily over the <b>38)</b> <?= soal_isian_ielts("jawaban_reading[37]")?> Here, the blocks could be cut and shaped using tools made of <b>39)</b> <?= soal_isian_ielts("jawaban_reading[38]")?> and wood. Some of these had to be sharpened regularly.</p>
                                                        <p>Eventually, the stone was moved into place to create a building. The job of moving the Stone was often done by <b>40)</b> <?= soal_isian_ielts("jawaban_reading[39]")?> or other unskilled workers.</p>
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
                                            TASK ONE<br>
                                            You should spend about 20 minutes on this task 
                                        </p>

                                        <p>Write about the following topic:</p>
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <i>A friend has agreed to look after your house and pet while you are on holiday. Write a letter to your friend. In your letter:</i>
                                                    <ul type="radio">
                                                        <li>give contact details for when you are away</li>
                                                        <li>give instructions about how to care for your pet</li>
                                                        <li>describe other household duties</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>

                                        <p>
                                            Write at least 150 words. You do NOT need to write any addresses.<br>
                                            Begin your letter as follows:<br>
                                            Dear____________________________,
                                        </p>

                                        <span>Type your answer here</span>
                                        <textarea id="textarea-1" class="form-control mb-3" name="text_writing[0]" data-bs-toggle="autosize" placeholder="" style="overflow: hidden scroll; overflow-wrap: break-word; resize: none; height: 56px;"></textarea>
                                        <center>Total word Count : <span id="count-textarea-1">0</span></center>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="question mb-3">
                                            TASK TWO <br>
                                            You should spend about 40 minutes on this task <br>
                                            Write about the following topic:
                                        </p>

                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <i>
                                                        Being a celebrity-such as a famous film star or sports personality-brings problems as well as benefits. <br>
                                                        Do you think that being a celebrity brings more benefits or more problems?
                                                    </i>
                                                </td>
                                            </tr>
                                        </table>

                                        <p>
                                            Give reasons for your answer and include any relevant examples from your own knowledge or experience<br>
                                            Write at least 250 words
                                        </p>

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