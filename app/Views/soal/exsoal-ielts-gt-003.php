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
                                            <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('assets/myaudio/listening-gt-003.mp3?t='.time())?>" type="audio/mpeg"></audio>
                                            <progress id="seekbar-1" value="0" max="1" style="width:100%;"></progress><br>
                                            <button class="btn btn-success btnAudio" data-id="1" type="button"><?= tablerIcon("player-play", "")?> play</button>
                                            <p><small class="text-danger"><i>note : The audio can only be played once</i></small></p>
                                        </center>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PREDICTION</b></center>
                                        <p class="question">
                                            SECTION 1 | Questions 1-10<br>
                                            Questions 1-6<br>
                                            Complete the notes below.<br>
                                            Write NO MORE THAN TWO WORDS AND / OR A NUMBER for each answer.<br>
                                        </p>
                                        <table>
        
                                        </table>
                                        <center>
                                            <table class="table" style="width:100%">
                                                <tr>
                                                    <td><center><b>PRESTON PARK RUN</b></center></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i><b>
                                                            Details of run<br>
                                                            Example:<br>
                                                            Day of Park Run: Saturday<br>
                                                        </b></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Start of run: in front of the 1<?= soal_isian_ielts("jawaban_listening[0]")?>.</p>
                                                        <p>Time of start: 2<?= soal_isian_ielts("jawaban_listening[1]")?>.</p>
                                                        <p>Length of run: 3<?= soal_isian_ielts("jawaban_listening[2]")?>.</p>
                                                        <p>At end of run: volunteer scans 4<?= soal_isian_ielts("jawaban_listening[3]")?>.</p>
                                                        <p>Best way to register: on the 5<?= soal_isian_ielts("jawaban_listening[4]")?>.</p>
                                                        <p>Cost of run: 6￡<?= soal_isian_ielts("jawaban_listening[5]")?>.</p>
                                                    </td>
                                                </tr>
                                            </table>
                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 7-10<br>
                                            Complete the notes below.<br>
                                            Write NO MORE THAN TWO WORDS AND / OR A NUMBER for each answer.
                                        </p>
                                        <table class="table" style="width:100%">
                                            <tr>
                                                <td>
                                                    <h3>Volunteering</h3>
                                                    <p>Contact name: Pete 7<?= soal_isian_ielts("jawaban_listening[6]")?>.</p>
                                                    <p>Phone number: 8<?= soal_isian_ielts("jawaban_listening[7]")?>.</p>
                                                    <p>Activities: setting up course</p>
                                                    <p>9<?= soal_isian_ielts("jawaban_listening[8]")?>the runners</p>
                                                    <p>10 <?= soal_isian_ielts("jawaban_listening[9]")?>for the weekly report </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION 2 | Questions 11-20<br>
                                            Questions 11-14<br>
                                            Complete the table below.<br>
                                            Write NO MORE THAN THREE WORDS AND / OR A NUMBER for each answer.<br>
                                        </p>
                                        <table class="table" style="width:100%">
                                            <tr>
                                                <td colspan="3">
                                                    <center><b>PACTON-ON-SEA BUS TOUR</b></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Bus stops</th>
                                                <th>Location</th>
                                                <th>Things to see</th>
                                            </tr>
                                            <tr>
                                                <td>Bus stop 1</td>
                                                <td>train station</td>
                                                <td>start of tour</td>
                                            </tr>
                                            <tr>
                                                <td>Bus stop 2</td>
                                                <td>the aquarium</td>
                                                <td>dolphins and 11<?= soal_isian_ielts("jawaban_listening[10]")?>.</td>
                                            </tr>
                                            <tr>
                                                <td>Bus stop 3</td>
                                                <td>12<?= soal_isian_ielts("jawaban_listening[11]")?></td>
                                                <td>yachts and power boats</td>
                                            </tr>
                                            <tr>
                                                <td>Bus stop 4</td>
                                                <td>13<?= soal_isian_ielts("jawaban_listening[12]")?> centre</td>
                                                <td>very old 14<?= soal_isian_ielts("jawaban_listening[13]")?>.</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 15-20<br>
                                            Complete the sentences below.<br>
                                            Write NO MORE THAN TWO WORDS AND / OR A NUMBER for each answer.<br>
                                        </p>
                                        <p>15. You need to have a<?= soal_isian_ielts("jawaban_listening[14]")?>to buy a ticket for ￡10.</p>
                                        <p>16. The bus tour lasts<?= soal_isian_ielts("jawaban_listening[15]")?>in total.</p>
                                        <p>17. The cost of the bus ticket includes entrance to the<?= soal_isian_ielts("jawaban_listening[16]")?>.</p>
                                        <p>18. You can listen to an audio commentary which has been made by the<?= soal_isian_ielts("jawaban_listening[17]")?>.</p>
                                        <p>19. If the weather is wet, it is a good idea to bring<?= soal_isian_ielts("jawaban_listening[18]")?>.</p>
                                        <p>20. Don’t forget to bring your<?= soal_isian_ielts("jawaban_listening[19]")?>when you book online.</p>
                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION 3 | Questions 21-30<br>
                                            Questions 21-26<br>
                                            Choose the correct answer, A,B or C.<br>
                                        </p>
                                        
                                        <?php
                                            $data_soal_21_26 = [
                                                [ 
                                                    "no" => 21, 
                                                    "soal" => "Dave Hadley says that the computer system has",
                                                    "pilihan" => [
                                                        "<b>A.</b> too many users.",
                                                        "<b>B.</b> never worked well.",
                                                        "<b>C.</b> become outdated.",
                                                    ],
                                                    "name" => "jawaban_listening[20]"
                                                ],
                                                [ 
                                                    "no" => 22, 
                                                    "soal" => "The main problem with the computer system is that it",
                                                    "pilihan" => [
                                                        "<b>A.</b> is too slow",
                                                        "<b>B.</b> stops working",
                                                        "<b>C.</b> displays incorrect data",
                                                    ],
                                                    "name" => "jawaban_listening[21]"
                                                ],
                                                [ 
                                                    "no" => 23, 
                                                    "soal" => "Timetabling has become an issue because",
                                                    "pilihan" => [
                                                        "<b>A.</b> there is not enough time for anyone to do it.",
                                                        "<b>B.</b> the system does not handle course options.",
                                                        "<b>C.</b> the courses are constantly changing.",
                                                    ],
                                                    "name" => "jawaban_listening[22]"
                                                ],
                                                [ 
                                                    "no" => 24, 
                                                    "soal" => "To solve the timetabling issues, Randhir suggests that",
                                                    "pilihan" => [
                                                        "<b>A.</b> students should create their own timetables",
                                                        "<b>B.</b> Dave should have someone to assist him.",
                                                        "<b>C.</b> the number of courses should be reduced.",
                                                    ],
                                                    "name" => "jawaban_listening[23]"
                                                ],
                                                [ 
                                                    "no" => 25, 
                                                    "soal" => "Randhir says that a new system may",
                                                    "pilihan" => [
                                                        "<b>A.</b> need to be trialed.",
                                                        "<b>B.</b> still to be trialed",
                                                        "<b>C.</b> be more economical",
                                                    ],
                                                    "name" => "jawaban_listening[24]"
                                                ],
                                                [ 
                                                    "no" => 26, 
                                                    "soal" => "Improving the existing system will take",
                                                    "pilihan" => [
                                                        "<b>A.</b> a few weeks.",
                                                        "<b>B.</b> four or five months.",
                                                        "<b>C.</b> nine months ",
                                                    ],
                                                    "name" => "jawaban_listening[25]"
                                                ],
                                            ];
                                        ?>

                                        <?php foreach ($data_soal_21_26 as $data_soal) :?>
                                            <?= soal_pg_ielts($data_soal)?>
                                        <?php endforeach;?>

                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 27-30<br>
                                            Complete the flowchart below.<br>
                                            Write NO MORE THAN TWO WORDS for each answer.<br>
                                        </p>
                                        
                                        <center>
                                            <table class="table" style="width:500px">
                                                <tr>
                                                    <td style="text-align:center">
                                                        <p><b>Next steps</b></p>
                                                        <p>Get approval from 27<?= soal_isian_ielts("jawaban_listening[26]")?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </center>

                                        <?= arrowIcon()?>

                                        <center>
                                            <table class="table" style="width:500px">
                                                <tr>
                                                    <td style="text-align:center">Complete a 28<?= soal_isian_ielts("jawaban_listening[27]")?> form</td>
                                                </tr>
                                            </table>
                                        </center>

                                        <?= arrowIcon()?>

                                        <center>
                                            <table class="table" style="width:500px">
                                                <tr>
                                                    <td style="text-align:center">Book a 29<?= soal_isian_ielts("jawaban_listening[28]")?> with the systems analyst</td>
                                                </tr>
                                            </table>
                                        </center>

                                        <?= arrowIcon()?>

                                        <center>
                                            <table class="table" style="width:500px">
                                                <tr>
                                                    <td style="text-align:center">Set up a 30<?= soal_isian_ielts("jawaban_listening[29]")?>with technologies team</td>
                                                </tr>
                                            </table>
                                        </center>

                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION 4 | Questions 31-40<br>
                                            Complete the sentences below.<br>
                                            Write NO MORE THAN TWO WORDS AND/OR A NUMBER for each answer.
                                        </p>

                                        <center><h2>Ceramics</h2></center>
                                        <p><b>31.</b> Ceramics date back approximately<?= soal_isian_ielts("jawaban_listening[30]")?>.</p>
                                        <p><b>32.</b> The first figurines were made in the area of <?= soal_isian_ielts("jawaban_listening[31]")?>.</p>
                                        <p><b>33.</b> Early humans could not use their pots to store <?= soal_isian_ielts("jawaban_listening[32]")?>.</p>
                                        <p><b>34.</b> The Chinese improved the quality of ceramics by mixing <?= soal_isian_ielts("jawaban_listening[33]")?>with the clay</p>
                                        <p><b>35.</b> Chinese Porcelain was also called<?= soal_isian_ielts("jawaban_listening[34]")?>.</p>
                                        <p><b>36.</b> Bottger added quartz and <?= soal_isian_ielts("jawaban_listening[35]")?> to clay to make porcelain.</p>

                                        <center><h2>Glass</h2></center>

                                        <p><b>37.</b> Glass production is similar to clay ceramics apart from the rate of  <?= soal_isian_ielts("jawaban_listening[36]")?>.</p>
                                        <p><b>38.</b> The Romans introduced the use of glass to make <?= soal_isian_ielts("jawaban_listening[37]")?>.</p>

                                        <center><h2>Concrete</h2></center>

                                        <p><b>39.</b> The discovery of concrete is probably due to observing reactions of water and <?= soal_isian_ielts("jawaban_listening[38]")?>.</p>
                                        <p><b>40.</b> the ability to build large <?= soal_isian_ielts("jawaban_listening[39]")?> contributed to the success of the Roman Empire</p>

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
                                            <p><center>Five Reviews of the Wellington Hotel</center></p>
                                            <p class='reading-1'>A. My husband and I first stayed at the Wellington a few years ago, and we’ve returned every year since then. When we arrive and check in, we’re always treated like old friends by the staff, so we very much feel at home. Our one disappointment during our last visit was that our room overlooked the car park, but that didn’t spoil our stay.</p>
                                            <p class='reading-2'>B. The hotel hardly seems to have changed in the last hundred years, and we prefer that to many modern hotels, which tend to look the same as each other. The Wellington has character! Our room was very comfortable and quite spacious. We can strongly recommend the breakfast, though we had to wait for a table as the hotel was so full. That was a bit annoying, and there was also nowhere to sit in the lounge.</p>
                                            <p class='reading-3'>C. We made our reservation by phone without problem, but when we arrived the receptionist couldn’t see it on the computer system. Luckily there was a room available. It wasn’t quite what we would have chosen, but it was a pleasure to sit in it with a cup of tea, and look out at the swimmers and surfers in the sea.</p>
                                            <p class='reading-4'>D. We’d be happy to stay at the Wellington again. Although there’s nothing special about the rooms, the view from the lounge is lovely, and the restaurant staff were friendly and efficient. Breakfast was a highlight – there was so much on offer we could hardly decide what to eat. We’d stay another time just for that!</p>
                                            <p class='reading-5'>E. The staff all did their jobs efficiently, and were very helpful when we asked for information about the area. The only difficulty we had was making our reservation online – it wasn’t clear whether payment for our deposit went through or not, and I had to call the hotel to find out. Still, once we’d arrived, everything went very smoothly, and we had a delicious dinner in the restaurant.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PART ONE<br>
                                            READING PASSAGE 1 | (Question 1-7)<br>
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
                                                            Questions 1-7<br>
                                                            Look at the five online reviews of the Wellington Hotel, A-E.<br>
                                                            Which review mentions the following?<br>
                                                            Write the correct letter, A-E, in boxes 1-7 on your answer sheet.<br>
                                                            P.S. You may use any letter more than once.<br>
                                                        </p>

                                                        <p>1. liking the view from the bedroom window <?= soal_isian_ielts("jawaban_reading[0]")?></p>
                                                        <p>2. finding the receptionists welcoming <?= soal_isian_ielts("jawaban_reading[1]")?></p>
                                                        <p>3. being pleased with the bedroom <?= soal_isian_ielts("jawaban_reading[2]")?></p>
                                                        <p>4. becoming confused when booking a room <?= soal_isian_ielts("jawaban_reading[3]")?></p>
                                                        <p>5. being impressed by the wide choice of food <?= soal_isian_ielts("jawaban_reading[4]")?></p>
                                                        <p>6. staying in the hotel regularly <?= soal_isian_ielts("jawaban_reading[5]")?></p>
                                                        <p>7. finding it inconvenient that the hotel was crowded <?= soal_isian_ielts("jawaban_reading[6]")?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center>Come and Play Walking Football or Walking Netball</center></p>
                                        <p class='reading-6'>Walking football and netball have become increasingly popular in recent years, but do you know you can take part in this area? The names make it clear what they are – two of the country’s favourite sports where, instead of running, the players walk. It’s as simple as that.</p>
                                        <p class='reading-7'>Walking football was invented in the UK in 2011, but it was a 2014 TV commercial for a bank, showing it providing financial support to someone who wanted to set up a website for the game, that brought it to people’s attention. Since then, tens of thousands of people — mostly, though not only, over the age of 50 — have started playing, and there are more than 800 walking football clubs. Both men and women play walking football, but at the moment the netball teams consist only of women. However, men are beginning to show an interest in playing.</p>
                                        <p class='reading-8'>The two games are designed to help people to be active or get fit, whatever their age and level of fitness. In particular, they were invented to encourage older men and women to get more exercise, and to give them a chance to meet other people. Regular physical activity helps to maintain energy, strength and flexibility. You can start gently and do a little more each session. The benefits include lower heart rate and blood pressure, greater mobility, less fat and more muscle.</p>
                                        <p class='reading-9'>Many players have given up a sport – either through age or injury – and can now take it up again. They’re great ways for people to enjoy a sport they used to play and love, and keep active at the same time, though people who have never played the standard game before are also very welcome.</p>
                                        <p class='reading-10'>The local councils Active Lifestyles Team runs sessions at all the council’s leisure centres. Come alone or with a friend, and enjoy a friendly game on Monday or Saturday afternoons, or Tuesday or Thursday evenings. Each session costs £3 per person, and you don’t have to come regularly or at the same time each week. Our aim is to set up netball and football clubs as soon as there are enough regular players.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 8-14<br>
                                            Do the following statements agree with the information given in the text on passage?<br>
                                            In boxes 8-14 on your answer sheet, write:<br>
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
                                                        <?php
                                                            $data_soal_8_14 = [
                                                                [
                                                                    "no" => 8,
                                                                    "soal" => "Walking football became well-known when a club featured in a TV programme about the sport.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[7]"
                                                                ],
                                                                [
                                                                    "no" => 9,
                                                                    "soal" => "The majority of walking netball players are men.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[8]"
                                                                ],
                                                                [
                                                                    "no" => 10,
                                                                    "soal" => "Most clubs arrange social activities for their members",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[9]"
                                                                ],
                                                                [
                                                                    "no" => 11,
                                                                    "soal" => "Players are tested regularly to measure changes in their fitness.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[10]"
                                                                ],
                                                                [
                                                                    "no" => 12,
                                                                    "soal" => "People who have never played football are encouraged to play walking football.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[11]"
                                                                ],
                                                                [
                                                                    "no" => 13,
                                                                    "soal" => "People can take part in the Active Lifestyles Team’s sessions whenever they wish",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[12]"
                                                                ],
                                                                [
                                                                    "no" => 14,
                                                                    "soal" => "The Active Lifestyles Team intends to start clubs in the future.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[13]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_8_14 as $data_soal) :?>
                                                            <?= soal_pg_ielts($data_soal);?>
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
                                        <p><center>Guide to Employees on Workplace Monitoring</center></p>
                                        <p><b>What is workplace monitoring?</b></p>
                                        <p class='reading-11'>Employers have the right to monitor your activities in many situations at work. For example, your activities may be recorded on CCTV cameras, and your letters may be opened and read. In addition, your employer may use an automated software programme to check the emails you receive at work. Phone calls may be listened to and recorded, and the log of websites you use may be checked.</p>
                                        <p class='reading-12'>All of these forms of monitoring are covered by data protection law. Data protection law doesn’t prevent monitoring in the workplace. However, it does set down rules about the circumstances and the way in which monitoring should be carried out.</p>
                                        <p class='reading-13'>Before deciding whether to introduce monitoring, your employer should identify any negative effects the monitoring may have on staff. This is called impact assessment.</p>
                                        <p><b>Monitoring electronic communications at work</b></p>
                                        <p class='reading-14'>Your employer can legally monitor your use of electronic communications in the workplace if the monitoring relates to the business and the equipment being monitored is provided partly or wholly for work.</p>
                                        <p class='reading-15'>Except in extremely limited circumstances, employers must take reasonable steps to let staff know that monitoring is happening, what is being monitored and why it is necessary.</p>
                                        <p class='reading-16'>As long as your employer sticks to these rules, they don’t need to get your consent before they monitor your electronic communications, but only if the monitoring is for specific reasons. These may be to establish facts which are relevant to the business or to check standards, for example, listening in to phone calls to assess the quality of your work. Monitoring is also allowed if its purpose is to prevent or detect crime. It may be necessary to make sure electronic systems are operating effectively, for example, to prevent computer viruses entering the system. Your employer is also allowed to listen in to any calls you make to confidential helplines, but in this case, he or she is not allowed to record these calls.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            READING PASSAGE 3 | (Question 15-21)<br>
                                            You should spend about 20 minutes on Questions 15-21 which are based on Reading Passage 3 below. <br>
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
                                                            Questions 15-21<br>
                                                            Complete the notes below.<br>
                                                            Choose NO MORE THAN TWO WORDS from the text for each answer.<br>
                                                            Write your answers in boxes 15-21 on your answer sheet.<br>
                                                        </p>
                                                        
                                                        <p><b>Guide to employees on workplace monitoring</b></p>
                                                        <p><b>Your employer may monitor you at work by checking</b></p>
                                                        <p>• recordings of your activities</p>
                                                        <p>• your letters and (15) <?= soal_isian_ielts("jawaban_reading[14]")?></p>
                                                        <p>• your phone calls and which websites you have visited</p>
                                                        <p>Rules for monitoring are established by data protection law. This states that employers must carry out a procedure that is known as (16) <?= soal_isian_ielts("jawaban_reading[15]")?> before introducing monitoring,</p>

                                                        <p><b>In general, monitoring is legal if</b></p>
                                                        <p>• it relates to the business</p>
                                                        <p>• you are using (17) <?= soal_isian_ielts("jawaban_reading[16]")?> intended for work</p>
                                                        <p>• the worker has been informed</p>


                                                        <p><b>Monitoring may be used</b></p>
                                                        <p>• to evaluate the (18) <?= soal_isian_ielts("jawaban_reading[17]")?> of your work</p>
                                                        <p>• to stop of find out about (19) <?= soal_isian_ielts("jawaban_reading[18]")?></p>
                                                        <p>• to stop the possibility of (20) <?= soal_isian_ielts("jawaban_reading[19]")?> affecting systems</p>
                                                        <p>• to check calls to (21) <?= soal_isian_ielts("jawaban_reading[20]")?> (these cannot be recorded)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><b>International Experience Canada: Application Process</b></center></p>
                                        <p class='reading-17'>If you want to travel and work temporarily in Canada as part of International Experience Canada (IEC), your first step is to become a candidate in one or more IEC pools. There are three categories of pool: International Co-op (Internship), Working Holiday and Young Professionals.</p>
                                        <p class='reading-18'>To apply, first use our questionnaire to see if you meet the criteria to get into the IEC pools. This should take you about ten minutes. You can find it at www.cic.gc.ca/ctc-vac/cometocanada.asp. After completing this, if you are eligible you will be sent a personal reference code, which you should use to create your online account. At the same time, you should fill in any remaining fields in your profile with the required information, including which IEC pools you want to be in. (Some parts will already have been completed for you.)</p>
                                        <p class='reading-19'>If you are sent an invitation to proceed with your application, you will have 10 days to decide whether to accept this or not. If you accept, click the ‘Start Application’ button. You then have 20 days to complete your application.</p>
                                        <p class='reading-20'>For International Co-op and Young Professionals categories, your employer in Canada must pay the compliance fee and inform you of your offer of employment number. (This does not apply to the Working Holiday pool.)</p>
                                        <p class='reading-21'>Once you have received this, you should then upload copies of police and medical certificates, if required. If you do not have these, you should upload proof that you have applied for them. You should then pay your participation fee of C$126 online by credit card. (There is an additional payment of C$100 if you are applying for the Working Holiday category.)</p>
                                        <p class='reading-22'>Your application will then be assessed. You can apply to withdraw at this stage and will be given a refund if you do this within 56 days. If your application is successful, you will receive a letter of introduction which you can show to Immigration when you enter Canada.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 22-27<br>
                                            Complete the flow-chart below.<br>
                                            Choose ONE WORD AND/OR A NUMBER ONLY from the text for each answer.<br>
                                            Write your answers in boxes 22-27 on your answer sheet.
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
                                                        <b><center>Applying to International Experience Canada</center></b>
                                                        <center>
                                                            <table class="table" style="width: 100%">
                                                                <tr>
                                                                    <td>Fill in the online 22 <?= soal_isian_ielts("jawaban_reading[21]")?> to get a personal reference code.</td>
                                                                </tr>
                                                            </table>
                                                        </center>
                                                            <?= arrowIcon()?>
                                                        <center>
                                                            <table class="table" style="width: 100%">
                                                                <tr>
                                                                    <td>Create your 23 <?= soal_isian_ielts("jawaban_reading[22]")?>, and provide the necessary information for the profile in your application.</td>
                                                                </tr>
                                                            </table>
                                                        </center>
                                                            <?= arrowIcon()?>
                                                        <center>
                                                            <table class="table" style="width: 100%">
                                                                <tr>
                                                                    <td>If sent an invitation, you must accept this within 24 <?= soal_isian_ielts("jawaban_reading[23]")?> . You then have a limited time to 25 <?= soal_isian_ielts("jawaban_reading[24]")?> the application.</td>
                                                                </tr>
                                                            </table>
                                                        </center>
                                                            <?= arrowIcon()?>
                                                        <center>
                                                            <table class="table" style="width: 100%">
                                                                <tr>
                                                                    <td>Your 26 <?= soal_isian_ielts("jawaban_reading[25]")?> is required to send you an offer of employment number.</td>
                                                                </tr>
                                                            </table>
                                                        </center>
                                                            <?= arrowIcon()?>
                                                        <center>
                                                            <table class="table" style="width: 100%">
                                                                <tr>
                                                                    <td>Upload copies of any necessary certificates or proof of application.</td>
                                                                </tr>
                                                            </table>
                                                        </center>
                                                            <?= arrowIcon()?>
                                                        <center>
                                                            <table class="table" style="width: 100%">
                                                                <tr>
                                                                    <td>Make the payment for participation online. You may receive a 27 <?= soal_isian_ielts("jawaban_reading[26]")?> later if you change your mind.</td>
                                                                </tr>
                                                            </table>
                                                        </center>
                                                            <?= arrowIcon()?>
                                                        <center>
                                                            <table class="table" style="width: 100%">
                                                                <tr>
                                                                    <td>If successful, you will receive a letter of introduction to be shown at Immigration.</td>
                                                                </tr>
                                                            </table>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><b>Research on Improving Agricultural Yields in Africa</b></center></p>
                                        <p><i>Three programs are investigating ways of improving agricultural productivity in Africa.</i></p>
                                        <p class='reading-23'>More than, half of the global population growth between now and 2050 is expected to occur in Africa. And more people means a requirement for more food.</p>
                                        <p class='reading-24'>Ethiopia, for example, has the largest livestock population in Africa but with a growing population, even its 53 million cattle are not enough. And now efforts to develop fanning there are bringing a significant health concern. Professor James Wood from the University of Cambridge explains that new breeds that are being introduced are more vulnerable to bovine TB (tuberculosis) than the zebu cattle which were previously reared there. ‘This may have health implications for those who work with and live alongside infected cattle, and also raises concerns about transmission to areas which previously had low levels of TB,’ he warns.</p>
                                        <p class='reading-25'>Wood leads a research programme which is looking at the feasibility of control strategies, including cattle vaccination. The programme brings together veterinary scientists, epidemiologists, geneticists, immunologists and social scientists in eight Ethiopian and UK institutions. ‘We need this mix because we are not only asking how effective strategies will be, but also whether farmers will accept them, and what the consequences are for prosperity and wellbeing,’ says Wood.</p>
                                        <p class='reading-26'>The impact that increasing productivity can have on farmers’ livelihoods is not lost on an insect expert at the University of Ghana, Dr Ken Fening, who is working on another food-related research project. Cabbages are not indigenous to Africa but have become a major cash crop for Ghanaian farmers and an important source of income for traders from markets and hotels. ‘A good crop can bring in money to buy fertilisers and farm equipment, and also help to pay for healthcare and education for the family,’ he says. Recently, however, fields of stunted, yellowing cabbages, their leaves curled and dotted with mould, have become a familiar and devastating sight for the farmers of Ghana.</p>
                                        <p class='reading-27'>From his field station base in Kpong, Ghana, Fening works closely with smallholder farmers on pest-control strategies. Two years ago they started reporting that a new disease was attacking their crops. ‘It seemed to be associated with massive infestations of pink and green aphids,’ says Fening, ‘and from my studies of the way insects interact with many different vegetables, I’m familiar with the types of damage they can cause.’</p>
                                        <p class='reading-28'>But farmers were typically seeing the total loss of their crops, and he realised that the devastation couldn’t just be caused by sap-sucking insects. Despite no previous reports of viral diseases affecting cabbage crops in Ghana, the symptoms suggested a viral pathogen.</p>
                                        <p class='reading-29'>Together with Cambridge plant biologist Dr John Carr, Fening collected samples of cabbage plants in Ghana showing signs of disease, and also aphids on the diseased plants. Back in Cambridge, Fening used screening techniques including a type of DNA ‘fingerprinting’ to identify the aphid species, and sophisticated molecular biology methods to try to identify the offending virus.</p>
                                        <p class='reading-30'>‘Aphids are a common carrier of plant-infecting viruses,’ explains Carr. ‘The “usual suspects” are turnip mosaic virus and cauliflower mosaic virus, which affect cabbages in Europe and the US.’</p>
                                        <p class='reading-31'>‘We found that two different species of aphids, pink and green, were generally found on the diseased cabbages,’ says Fening. ‘It turned out this was the first record of the green aphid species ever being seen in Ghana.’ The pink aphid was identified as Myzus persicae (Sulzer).</p>
                                        <p class='reading-32'>What’s more, the virus was not what they expected, and work is now ongoing to identify the culprit. The sooner it can be characterised, the sooner sustainable crop protection strategies can be developed to prevent further spread of the disease not only in Ghana, but also in other countries in the region. Another researcher who hopes that eradication strategies will be the outcome of her research project is Dr Theresa Manful. Like Fening, she is a researcher at the University of Ghana. She has been working with Cambridge biochemist Professor Mark Carrington on a disease known as trypanosomiasis.</p>
                                        <p class='reading-33'>‘This is a major constraint to cattle fearing in Africa,’ she explains. ‘Although trypanosomiasis is also a disease of humans, the number of cases is low, and the more serious concerns about the disease relate to the economic impact on agricultural production.’</p>
                                        <p class='reading-34'>The parasite that causes the disease is carried by the tsetse fly, which colonises vast swathes of sub-Saharan Africa. Carrington says that a lot is now known about the parasite’s molecular mechanisms, in particular the way it evades the immune system of the animal acting as its host by altering the proteins in its coat so as to remain ‘invisible’. ‘But then when you look at the effect on large animals, you realise that there is almost nothing known about the dynamics of an infection, and even whether an infection acquired at an early age persists for its lifetime,’ he says. So Manful and Carrington set about testing cattle in Ghana. They discovered that nearly all were infected most of the time.</p>
                                        <p class='reading-35'>For Manful, one of the important gains has been the ability to expand the research in Ghana: ‘I now have a fully functional lab and can do DNA extraction and analysis in Ghana -1 don’t have to bring samples to Cambridge. We are teaching students from five Ghanaian institutions the diagnostic methods.’</p>
                                        <p class='reading-36'>‘Agriculture faces increasing challenges,’ adds Carr. ‘Bioscience is playing a crucial part in developing ways to mitigate pest impact and reduce the spread of parasites. We want to ensure not only that every harvest is successful, but also that it’s maximally successful.’</p>
                                        <p><i>* aphids: small insects which feed by sucking liquid from plants.</i></p>
                                         ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            READING PASSAGE 5 | (Question 28-40)<br>
                                            Read the text below and answer Questions 28-40.
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
                                                            Write the correct letter in boxes 28-32 on your answer sheet.<br>
                                                        </p>
                                                        <?php
                                                            $data_soal_28_32 = [
                                                                [
                                                                    "no" => 28,
                                                                    "soal" => "What is the main problem faced by cattle farmers in Ethiopia, according to Professor Wood?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> TB is being transmitted from people to cattle.",
                                                                        "<b>B.</b> New breeds of cattle have led to an increase in TB.",
                                                                        "<b>C.</b> The traditional breeds of cattle are being affected by TB.",
                                                                        "<b>D.</b> TB has spread into places where it was previously unknown.",
                                                                    ],
                                                                    "name" => "jawaban_reading[27]"
                                                                ],
                                                                [
                                                                    "no" => 29,
                                                                    "soal" => "When discussing the cultivation of cabbages in Ghana, the writer says that this crop",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> was introduced from outside Africa.",
                                                                        "<b>B.</b> is not eaten much by local people.",
                                                                        "<b>C.</b> is not grown correctly by many farmers.",
                                                                        "<b>D.</b> requires the use of fertiliser and special equipment.",
                                                                    ],
                                                                    "name" => "jawaban_reading[28]"
                                                                ],
                                                                [
                                                                    "no" => 30,
                                                                    "soal" => "Fening believed that the new disease destroying cabbages was",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> caused by overuse of pesticides.",
                                                                        "<b>B.</b> also affecting other locally grown vegetables.",
                                                                        "<b>C.</b> linked to insect attacks on these vegetables.",
                                                                        "<b>D.</b> connected with the development of new insect breeds.",
                                                                    ],
                                                                    "name" => "jawaban_reading[29]"
                                                                ],
                                                                [
                                                                    "no" => 31,
                                                                    "soal" => "Fening first suspected that the cabbage disease was caused by a virus because",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> evidence of viral disease could be seen on the cabbage leaves.",
                                                                        "<b>B.</b> pink and green aphids did not commonly attack cabbages.",
                                                                        "<b>C.</b> viral diseases affecting vegetables had occurred elsewhere in Africa.",
                                                                        "<b>D.</b> aphids would not have caused so much damage to the crops.",
                                                                    ],
                                                                    "name" => "jawaban_reading[30]"
                                                                ],
                                                                [
                                                                    "no" => 32,
                                                                    "soal" => "When doing further research in Cambridge, Fening and Carr discovered that",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> the virus was unfamiliar to them.",
                                                                        "<b>B.</b> two different viruses were present.",
                                                                        "<b>C.</b> the aphids’ DNA was more complex than expected.",
                                                                        "<b>D.</b> one aphid was more harmful than the other.",
                                                                    ],
                                                                    "name" => "jawaban_reading[31]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_28_32 as $data_soal) :?>
                                                            <?= soal_pg_ielts($data_soal);?>
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
                                        <p><center><b>Research on Improving Agricultural Yields in Africa</b></center></p>
                                        <p><i>Three programs are investigating ways of improving agricultural productivity in Africa.</i></p>
                                        <p class='reading-37'>More than, half of the global population growth between now and 2050 is expected to occur in Africa. And more people means a requirement for more food.</p>
                                        <p class='reading-38'>Ethiopia, for example, has the largest livestock population in Africa but with a growing population, even its 53 million cattle are not enough. And now efforts to develop fanning there are bringing a significant health concern. Professor James Wood from the University of Cambridge explains that new breeds that are being introduced are more vulnerable to bovine TB (tuberculosis) than the zebu cattle which were previously reared there. ‘This may have health implications for those who work with and live alongside infected cattle, and also raises concerns about transmission to areas which previously had low levels of TB,’ he warns.</p>
                                        <p class='reading-39'>Wood leads a research programme which is looking at the feasibility of control strategies, including cattle vaccination. The programme brings together veterinary scientists, epidemiologists, geneticists, immunologists and social scientists in eight Ethiopian and UK institutions. ‘We need this mix because we are not only asking how effective strategies will be, but also whether farmers will accept them, and what the consequences are for prosperity and wellbeing,’ says Wood.</p>
                                        <p class='reading-40'>The impact that increasing productivity can have on farmers’ livelihoods is not lost on an insect expert at the University of Ghana, Dr Ken Fening, who is working on another food-related research project. Cabbages are not indigenous to Africa but have become a major cash crop for Ghanaian farmers and an important source of income for traders from markets and hotels. ‘A good crop can bring in money to buy fertilisers and farm equipment, and also help to pay for healthcare and education for the family,’ he says. Recently, however, fields of stunted, yellowing cabbages, their leaves curled and dotted with mould, have become a familiar and devastating sight for the farmers of Ghana.</p>
                                        <p class='reading-41'>From his field station base in Kpong, Ghana, Fening works closely with smallholder farmers on pest-control strategies. Two years ago they started reporting that a new disease was attacking their crops. ‘It seemed to be associated with massive infestations of pink and green aphids,’ says Fening, ‘and from my studies of the way insects interact with many different vegetables, I’m familiar with the types of damage they can cause.’</p>
                                        <p class='reading-42'>But farmers were typically seeing the total loss of their crops, and he realised that the devastation couldn’t just be caused by sap-sucking insects. Despite no previous reports of viral diseases affecting cabbage crops in Ghana, the symptoms suggested a viral pathogen.</p>
                                        <p class='reading-43'>Together with Cambridge plant biologist Dr John Carr, Fening collected samples of cabbage plants in Ghana showing signs of disease, and also aphids on the diseased plants. Back in Cambridge, Fening used screening techniques including a type of DNA ‘fingerprinting’ to identify the aphid species, and sophisticated molecular biology methods to try to identify the offending virus.</p>
                                        <p class='reading-44'>‘Aphids are a common carrier of plant-infecting viruses,’ explains Carr. ‘The “usual suspects” are turnip mosaic virus and cauliflower mosaic virus, which affect cabbages in Europe and the US.’</p>
                                        <p class='reading-45'>‘We found that two different species of aphids, pink and green, were generally found on the diseased cabbages,’ says Fening. ‘It turned out this was the first record of the green aphid species ever being seen in Ghana.’ The pink aphid was identified as Myzus persicae (Sulzer).</p>
                                        <p class='reading-46'>What’s more, the virus was not what they expected, and work is now ongoing to identify the culprit. The sooner it can be characterised, the sooner sustainable crop protection strategies can be developed to prevent further spread of the disease not only in Ghana, but also in other countries in the region. Another researcher who hopes that eradication strategies will be the outcome of her research project is Dr Theresa Manful. Like Fening, she is a researcher at the University of Ghana. She has been working with Cambridge biochemist Professor Mark Carrington on a disease known as trypanosomiasis.</p>
                                        <p class='reading-47'>‘This is a major constraint to cattle fearing in Africa,’ she explains. ‘Although trypanosomiasis is also a disease of humans, the number of cases is low, and the more serious concerns about the disease relate to the economic impact on agricultural production.’</p>
                                        <p class='reading-48'>The parasite that causes the disease is carried by the tsetse fly, which colonises vast swathes of sub-Saharan Africa. Carrington says that a lot is now known about the parasite’s molecular mechanisms, in particular the way it evades the immune system of the animal acting as its host by altering the proteins in its coat so as to remain ‘invisible’. ‘But then when you look at the effect on large animals, you realise that there is almost nothing known about the dynamics of an infection, and even whether an infection acquired at an early age persists for its lifetime,’ he says. So Manful and Carrington set about testing cattle in Ghana. They discovered that nearly all were infected most of the time.</p>
                                        <p class='reading-49'>For Manful, one of the important gains has been the ability to expand the research in Ghana: ‘I now have a fully functional lab and can do DNA extraction and analysis in Ghana -1 don’t have to bring samples to Cambridge. We are teaching students from five Ghanaian institutions the diagnostic methods.’</p>
                                        <p class='reading-50'>‘Agriculture faces increasing challenges,’ adds Carr. ‘Bioscience is playing a crucial part in developing ways to mitigate pest impact and reduce the spread of parasites. We want to ensure not only that every harvest is successful, but also that it’s maximally successful.’</p>
                                        <p><i>* aphids: small insects which feed by sucking liquid from plants.</i></p>
                                         ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            READING PASSAGE 5 | (Question 28-40)<br>
                                            Read the text below and answer Questions 28-40.
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
                                                            Look at the following statements (Questions 33-36) and the list of researchers below.<br>
                                                            Match each statement with the correct researcher, A-E.<br>
                                                            Write the correct letter, A-E, in boxes 33-36 on your answer sheet.<br>
                                                            P.S. You may use any letter more than once.
                                                        </p>
                                                        
                                                        <table class="table">
                                                            <tr>
                                                                <td>
                                                                    <p><b>List Of Reserches</b></p>
                                                                    <p><b>A</b> James Wood</p>
                                                                    <p><b>B</b> Ken Fening</p>
                                                                    <p><b>C</b> John Carr</p>
                                                                    <p><b>D</b> Theresa Manful</p>
                                                                    <p><b>E</b> Mark Carrington</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <p><b>33.</b> A particular crop may make an important contribution to the local economy in one African country. <?= soal_isian_ielts("jawaban_reading[32]")?></p>
                                                        <p><b>34.</b> Tests will be carried out by local people in the country where the research is focused. <?= soal_isian_ielts("jawaban_reading[33]")?></p>
                                                        <p><b>35.</b> Different specialists must work together to ensure the success of a programme. <?= soal_isian_ielts("jawaban_reading[34]")?></p>
                                                        <p><b>36.</b> One type of insect attacking plants in Ghana was previously unknown there. <?= soal_isian_ielts("jawaban_reading[35]")?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><b>Research on Improving Agricultural Yields in Africa</b></center></p>
                                        <p><i>Three programs are investigating ways of improving agricultural productivity in Africa.</i></p>
                                        <p class='reading-51'>More than, half of the global population growth between now and 2050 is expected to occur in Africa. And more people means a requirement for more food.</p>
                                        <p class='reading-52'>Ethiopia, for example, has the largest livestock population in Africa but with a growing population, even its 53 million cattle are not enough. And now efforts to develop fanning there are bringing a significant health concern. Professor James Wood from the University of Cambridge explains that new breeds that are being introduced are more vulnerable to bovine TB (tuberculosis) than the zebu cattle which were previously reared there. ‘This may have health implications for those who work with and live alongside infected cattle, and also raises concerns about transmission to areas which previously had low levels of TB,’ he warns.</p>
                                        <p class='reading-53'>Wood leads a research programme which is looking at the feasibility of control strategies, including cattle vaccination. The programme brings together veterinary scientists, epidemiologists, geneticists, immunologists and social scientists in eight Ethiopian and UK institutions. ‘We need this mix because we are not only asking how effective strategies will be, but also whether farmers will accept them, and what the consequences are for prosperity and wellbeing,’ says Wood.</p>
                                        <p class='reading-54'>The impact that increasing productivity can have on farmers’ livelihoods is not lost on an insect expert at the University of Ghana, Dr Ken Fening, who is working on another food-related research project. Cabbages are not indigenous to Africa but have become a major cash crop for Ghanaian farmers and an important source of income for traders from markets and hotels. ‘A good crop can bring in money to buy fertilisers and farm equipment, and also help to pay for healthcare and education for the family,’ he says. Recently, however, fields of stunted, yellowing cabbages, their leaves curled and dotted with mould, have become a familiar and devastating sight for the farmers of Ghana.</p>
                                        <p class='reading-55'>From his field station base in Kpong, Ghana, Fening works closely with smallholder farmers on pest-control strategies. Two years ago they started reporting that a new disease was attacking their crops. ‘It seemed to be associated with massive infestations of pink and green aphids,’ says Fening, ‘and from my studies of the way insects interact with many different vegetables, I’m familiar with the types of damage they can cause.’</p>
                                        <p class='reading-56'>But farmers were typically seeing the total loss of their crops, and he realised that the devastation couldn’t just be caused by sap-sucking insects. Despite no previous reports of viral diseases affecting cabbage crops in Ghana, the symptoms suggested a viral pathogen.</p>
                                        <p class='reading-57'>Together with Cambridge plant biologist Dr John Carr, Fening collected samples of cabbage plants in Ghana showing signs of disease, and also aphids on the diseased plants. Back in Cambridge, Fening used screening techniques including a type of DNA ‘fingerprinting’ to identify the aphid species, and sophisticated molecular biology methods to try to identify the offending virus.</p>
                                        <p class='reading-58'>‘Aphids are a common carrier of plant-infecting viruses,’ explains Carr. ‘The “usual suspects” are turnip mosaic virus and cauliflower mosaic virus, which affect cabbages in Europe and the US.’</p>
                                        <p class='reading-59'>‘We found that two different species of aphids, pink and green, were generally found on the diseased cabbages,’ says Fening. ‘It turned out this was the first record of the green aphid species ever being seen in Ghana.’ The pink aphid was identified as Myzus persicae (Sulzer).</p>
                                        <p class='reading-60'>What’s more, the virus was not what they expected, and work is now ongoing to identify the culprit. The sooner it can be characterised, the sooner sustainable crop protection strategies can be developed to prevent further spread of the disease not only in Ghana, but also in other countries in the region. Another researcher who hopes that eradication strategies will be the outcome of her research project is Dr Theresa Manful. Like Fening, she is a researcher at the University of Ghana. She has been working with Cambridge biochemist Professor Mark Carrington on a disease known as trypanosomiasis.</p>
                                        <p class='reading-61'>‘This is a major constraint to cattle fearing in Africa,’ she explains. ‘Although trypanosomiasis is also a disease of humans, the number of cases is low, and the more serious concerns about the disease relate to the economic impact on agricultural production.’</p>
                                        <p class='reading-62'>The parasite that causes the disease is carried by the tsetse fly, which colonises vast swathes of sub-Saharan Africa. Carrington says that a lot is now known about the parasite’s molecular mechanisms, in particular the way it evades the immune system of the animal acting as its host by altering the proteins in its coat so as to remain ‘invisible’. ‘But then when you look at the effect on large animals, you realise that there is almost nothing known about the dynamics of an infection, and even whether an infection acquired at an early age persists for its lifetime,’ he says. So Manful and Carrington set about testing cattle in Ghana. They discovered that nearly all were infected most of the time.</p>
                                        <p class='reading-63'>For Manful, one of the important gains has been the ability to expand the research in Ghana: ‘I now have a fully functional lab and can do DNA extraction and analysis in Ghana -1 don’t have to bring samples to Cambridge. We are teaching students from five Ghanaian institutions the diagnostic methods.’</p>
                                        <p class='reading-64'>‘Agriculture faces increasing challenges,’ adds Carr. ‘Bioscience is playing a crucial part in developing ways to mitigate pest impact and reduce the spread of parasites. We want to ensure not only that every harvest is successful, but also that it’s maximally successful.’</p>
                                        <p><i>* aphids: small insects which feed by sucking liquid from plants.</i></p>
                                         ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            READING PASSAGE 5 | (Question 28-40)<br>
                                            Read the text below and answer Questions 28-40.
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
                                                            Complete the summary below.<br>
                                                            Choose NO MORE THAN TWO WORDS from the text for each answer.<br>
                                                            Write your answers in boxes 37-40 on your answer sheet.
                                                        </p>
                                                        
                                                        <p><b><center>Trypanosomiasis</center></b></p>
                                                        <p>Trypanosomiasis is a disease caused by a parasite which is spread by an insect called the (37) <?= soal_isian_ielts("jawaban_reading[36]")?> The parasite can remain unaffected by the host’s (38) <?= soal_isian_ielts("jawaban_reading[37]")?> because it is able to change the (39) <?= soal_isian_ielts("jawaban_reading[38]")?> on its outer covering. It is uncommon among humans but has been found to affect most (40) <?= soal_isian_ielts("jawaban_reading[39]")?> in Ghana.</p>

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
                                                    <p>Your neighbour keeps his/her animal in the garden. Write to him/her about it and the inconvenience it causes you and your family. In your </p>letter:
                                                    <p>• tell them what the problem is</p>
                                                    <p>• explain why it causes inconvenience</p>
                                                    <p>• suggest a possible solution to it</p>
                                                    <p>• say what actions you might take if the need arises.</p>
                                                </td>
                                            </tr>
                                        </table>

                                        <p>You should write at least 150 words </p>
                                        <p>You do NOT need to write any addresses </p>
                                        <p>Begin your letter as follows:</p>
                                        <p>Dear……….,</p>
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
                                            Write about the following topic:
                                        </p>

                                        <table class="table">
                                            <tr>
                                                <td>
                                                    In many countries, as people are earning more these days, they are also spending money in buying more and more items. Do you think it is positive or a negative development?
                                                </td>
                                            </tr>
                                        </table>

                                        <p>Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>
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

    for (let i = 1; i < 54; i++) {
        // var words = $( ".reading-"+i).first().text().split( /\s+/ );
        var words = $( ".reading-"+i).first().text().split(" ");
        var text = words.join( "</span> <span>" );

        text = text.replace("()", "<i>");
        text = text.replace("(*)", "</i>");

        text = text.replace("((b))", "<b>");
        text = text.replace("((/b))", "</b>");
        
        text = text.replace("((u))", "<u>");
        text = text.replace("((/u))", "</u>");

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