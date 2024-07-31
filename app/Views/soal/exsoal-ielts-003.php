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
                                            <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('assets/myaudio/listening-003.mp3?t='.time())?>" type="audio/mpeg"></audio>
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
                                            Complete the table below.<br>
                                            Write NO MORE THAN ONE WORD AND/OR A NUMBER for each answer.
                                        </p>
                                        <table>
        
                                        </table>
                                        <center>
                                            <table class="table" style="width:100%">
                                                <tr>
                                                    <td colspan="5"><center><b>Community Centre Evening Classes</b></center></td>
                                                </tr>
                                                <tr>
                                                    <th>Class</th>
                                                    <th>Where</th>
                                                    <th>When</th>
                                                    <th>What to bring</th>
                                                    <th>Cost</th>
                                                </tr>
                                                <tr>
                                                    <td>Painting with watercolours</td>
                                                    <td><i><b>Example</b></i> in the <u><i>hall</i></u></td>
                                                    <td>at <b>1</b><?= soal_isian_ielts("jawaban_listening[0]")?> pm on Tuesdays</td>
                                                    <td>water jar and set of <b>2</b><?= soal_isian_ielts("jawaban_listening[1]")?></td>
                                                    <td>£45 – four classes</td>
                                                </tr>
                                                <tr>
                                                    <td>Maori language</td>
                                                    <td>the small room at the <b>3</b><?= soal_isian_ielts("jawaban_listening[2]")?> of the building</td>
                                                    <td>starts in <b>4</b><?= soal_isian_ielts("jawaban_listening[3]")?></td>
                                                    <td>small recorder</td>
                                                    <td>£40 – five classes</td>
                                                </tr>
                                                <tr>
                                                    <td>Digital photography</td>
                                                    <td>room 9</td>
                                                    <td>6 pm Wednesday evenings</td>
                                                    <td>the <b>5</b><?= soal_isian_ielts("jawaban_listening[4]")?> for the camera</td>
                                                    <td><b>6</b> £<?= soal_isian_ielts("jawaban_listening[5]")?> – eight classes</td>
                                                </tr>
                                            </table>
                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 7-10<br>
                                            Answer the sentences below.<br>
                                            Write ONE WORD ONLY for each answer.<br>
                                        </p>
                                        <p><b>7.</b> The watercolours class suits people who are<?= soal_isian_ielts("jawaban_listening[6]")?></p>
                                        <p><b>8.</b> To find out about the Maori language class, contact Jason<?= soal_isian_ielts("jawaban_listening[7]")?></p>
                                        <p><b>9.</b> For the photography class, check the<?= soal_isian_ielts("jawaban_listening[8]")?> for the camera.</p>
                                        <p><b>10.</b> There is a trip to a local<?= soal_isian_ielts("jawaban_listening[9]")?> in the final week of the photography class.</p>
                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION 2 | Questions 11-20<br>
                                            Questions 11 and 12<br>
                                            Choose TWO letters, A-E.<br>
                                            Which TWO tasks will the volunteers in Group A be responsible for?
                                        </p>
                                        <p>
                                            <b>A.</b> widening pathways<br>
                                            <b>B.</b> planting trees<br>
                                            <b>C.</b> picking up rubbish<br>
                                            <b>D.</b> putting up signs<br>
                                            <b>E.</b> building fences
                                        </p>
                                        <p><b>11.</b> <?= soal_isian_ielts("jawaban_listening[10]")?></p>
                                        <p><b>12.</b> <?= soal_isian_ielts("jawaban_listening[11]")?></p>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 13 and 14<br>
                                            Choose TWO letters, A-E.<br>
                                            Which TWO items should volunteers in Group A bring with them?
                                        </p>
                                        <p>
                                            <b>A.</b> food and water<br>
                                            <b>B.</b> boots<br>
                                            <b>C.</b> gloves<br>
                                            <b>D.</b> raincoats<br>
                                            <b>E.</b> their own tools
                                        </p>
                                        <p><b>13.</b> <?= soal_isian_ielts("jawaban_listening[12]")?></p>
                                        <p><b>14.</b> <?= soal_isian_ielts("jawaban_listening[13]")?></p>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 15-20<br>
                                            Label the plan below<br>
                                            Write the correct letter, A-I, next to Questions 15-20.
                                        </p>

                                        <div class="row">
                                            <div class="col-8">
                                                <img src="<?= base_url()?>assets/img/003_15-20.jpg" alt="">
                                            </div>
                                            <div class="col-4">
                                                <p>15. Vegetable beds <?= soal_isian_ielts("jawaban_listening[14]")?>.</p>
                                                <p>16. Bee hives <?= soal_isian_ielts("jawaban_listening[15]")?>.</p>
                                                <p>17. Seating <?= soal_isian_ielts("jawaban_listening[16]")?>.</p>
                                                <p>18. Adventure playground <?= soal_isian_ielts("jawaban_listening[17]")?>.</p>
                                                <p>19. Sand area <?= soal_isian_ielts("jawaban_listening[18]")?>.</p>
                                                <p>20. Pond <?= soal_isian_ielts("jawaban_listening[19]")?>.</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION 3 | Questions 21-30<br>
                                            Questions 21-25<br>
                                            Choose the correct answer, A, B or C.
                                        </p>

                                        <?php
                                            $data_soal_21_25 = [
                                                [ 
                                                    "no" => 21, 
                                                    "soal" => "What point does Robert make about the 2013 study in Britain?",
                                                    "pilihan" => [
                                                        "<b>A.</b> It focused more on packaging than wasted food.",
                                                        "<b>B.</b> It proved that households produced more waste than restaurants.",
                                                        "<b>C.</b> It included liquid waste as well as solid water.",
                                                    ],
                                                    "name" => "jawaban_listening[20]"
                                                ],
                                                [ 
                                                    "no" => 22, 
                                                    "soal" => "The speakers agree that food waste reports should emphasise the connection between carbon dioxide emissions and",
                                                    "pilihan" => [
                                                        "<b>A.</b> food production.",
                                                        "<b>B.</b> transport of food to landfill sites.",
                                                        "<b>C.</b> distribution of food products.",
                                                    ],
                                                    "name" => "jawaban_listening[21]"
                                                ],
                                                [ 
                                                    "no" => 23, 
                                                    "soal" => "Television programmes now tend to focus on",
                                                    "pilihan" => [
                                                        "<b>A.</b> the nutritional value of food products.",
                                                        "<b>B.</b> the origin of food products.",
                                                        "<b>C.</b> the chemicals found in food products.",
                                                    ],
                                                    "name" => "jawaban_listening[22]"
                                                ],
                                                [ 
                                                    "no" => 24, 
                                                    "soal" => "For Anna, the most significant point about food waste is",
                                                    "pilihan" => [
                                                        "<b>A.</b> the moral aspect",
                                                        "<b>B.</b> the environment impact",
                                                        "<b>C.</b> the economic effect",
                                                    ],
                                                    "name" => "jawaban_listening[23]"
                                                ],
                                                [ 
                                                    "no" => 25, 
                                                    "soal" => "Anna and Robert decide to begin their presentation by",
                                                    "pilihan" => [
                                                        "<b>A.</b> handing out a questionnaire.",
                                                        "<b>B.</b> providing statistical evidence.",
                                                        "<b>C.</b> showing images of wasted food.",
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
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            Questions 26-30
                                        </p>
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <center>Advantages</center><br>
                                                    <b>A.</b> It should save time.<br>
                                                    <b>B.</b> It will create new jobs.<br>
                                                    <b>C.</b> It will benefit local communities.<br>
                                                    <b>D.</b> It will make money.<br>
                                                    <b>E.</b> It will encourage personal responsibility.<br>
                                                    <b>F.</b> It will be easy to advertise.<br>
                                                    <b>G.</b> It will involve very little cost.
                                                </td>
                                            </tr>
                                        </table>
                                        <p class="question">What advantage do the speakers identify for each of the following projects? Choose FIVE answers from the box and write the correct letter, A-G, next to Questions 26-30.</p>
                                        <p><b>26.</b> edible patch <?= soal_isian_ielts("jawaban_listening[25]")?>.</p>
                                        <p><b>27.</b> ripeness sector <?= soal_isian_ielts("jawaban_listening[26]")?>.</p>
                                        <p><b>28.</b> waste tracking technology <?= soal_isian_ielts("jawaban_listening[27]")?>.</p>
                                        <p><b>29.</b> smartphone application <?= soal_isian_ielts("jawaban_listening[28]")?>.</p>
                                        <p><b>30.</b> food waste composting <?= soal_isian_ielts("jawaban_listening[29]")?>.</p>
                                    </div>
                                </div>
        
                                <div class="shadow card mb-3">
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION 4 | Questions 31-40<br>
                                            Complete the notes below.<br>
                                            Write ONE WORD for each answer.
                                        </p>
                                        
                                        <p><b><center>KITE-MAKING BY THE MAORI PEOPLE OF NEW ZEALAND</center></b></p>

                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <p><b>Making and appearance of the kites</b></p>
                                                    <p>– The priests who made the kites had rules for size and scale</p>
                                                    <p>– 31<?= soal_isian_ielts("jawaban_listening[30]")?>. was not allowed during a kite’s preparation</p>

                                                    <p><b>Kites:</b></p>
                                                    <p>– often represented a bird, a god, or a 32<?= soal_isian_ielts("jawaban_listening[31]")?>.</p>
                                                    <p>– had frames that were decorated with grasses and 33<?= soal_isian_ielts("jawaban_listening[32]")?>.</p>
                                                    <p>– had a line of noisy 34<?= soal_isian_ielts("jawaban_listening[33]")?>. attached to them.</p>
                                                    <p>– could be triangular, rectangular or 35<?= soal_isian_ielts("jawaban_listening[34]")?>.</p>
                                                    <p>– had patterns made from clay mixed with 36<?= soal_isian_ielts("jawaban_listening[35]")?>.</p>
                                                    <p>– sometimes had human-head masks with 37<?= soal_isian_ielts("jawaban_listening[36]")?>. and a tattoo.</p>

                                                    <p><b>Purpose and function of kites:</b></p>
                                                    <p>– a way of sending 38<?= soal_isian_ielts("jawaban_listening[37]")?>. to the gods</p>
                                                    <p>– a way of telling other villages that a 39<?= soal_isian_ielts("jawaban_listening[38]")?>. was necessary</p>
                                                    <p>– a means of 40<?= soal_isian_ielts("jawaban_listening[39]")?>. if enemies were coming.</p>
                                                </td>
                                            </tr>
                                        </table>

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
                                        <center><b>Oxytocin</b></center>
                                        <i><center>The positive and negative effects of the chemical known as the ‘love hormone’</center></i>
                                        <p><b>A</b></p>
                                        <p class='reading-1'>Oxytocin is a chemical, a hormone produced in the pituitary gland in the brain. It was through various studies focusing on animals that scientists first became aware of the influence of oxytocin. They discovered that it helps reinforce the bonds between prairie voles, which mate for life, and triggers the motherly behaviour that sheep show towards their newborn lambs. It is also released by women in childbirth, strengthening the attachment between mother and baby. Few chemicals have as positive a reputation as oxytocin, which is sometimes referred to as the ‘love hormone’. One sniff of it can, it is claimed, make a person more trusting, empathetic, generous and cooperative. It is time, however, to revise this wholly optimistic view. A new wave of studies has shown that its effects vary greatly depending on the person and the circumstances, and it can impact on our social interactions for worse as well as for better.</p>
                                        <p><b>B</b></p>
                                        <p class='reading-2'>Oxytocin’s role in human behaviour first emerged in 2005. In a groundbreaking experiments, Markus Heinrichs and his colleagues at the University of Freiburg, Germany, asked volunteers to do an activity in which they could invest money with an anonymous person who was not guaranteed to be honest. The team found the participants who had sniffed oxytocin via a nasal spray beforehand invested more money than those who received a placebo instead. The study was the start of research into the effects of oxytocin on human interactions. ‘For eight years, it was quite a lonesome field,’ Heinrichs recalls. ‘Now, everyone is interested.’ These follow-up studies have shown that after a sniff of the hormone, people become more charitable, better at reading emotions on others’ faces and at communicating constructively in arguments. Together, the results fuelled the view that oxytocin universally enhanced the positive aspects of our social nature.</p>
                                        <p><b>C</b></p>
                                        <p class='reading-3'>Then, after a few years, contrasting findings began to emerge. Simone Shamay-Tsoory at the at the University of Haifa, Israel, found that when volunteers played a competitive game, those who inhaled the hormone showed more pleasure when they beat other players, and felt more envy when others won. What’s more, administering oxytocin also has sharply contrasting outcomes depending on a person’s disposition. Jennifer Bartz from Mount Sinai School of Medicine, New York, found that it improves people’s ability to read emotions, but only if they are not very socially adept to begin with. Her research also shows that oxytocin in fact reduces cooperation in subjects who are particularly anxious or sensitive to rejection.</p>
                                        <p><b>D</b></p>
                                        <p class='reading-4'>Another discovery is that oxytocin’s effects vary depending on who we are interacting with. Studies conducted by Carolyn DeClerck of the University of Antwerp, Belgium, revealed that people who had received a dose of oxytocin actually became less cooperative when dealing with complete strangers. Meanwhile, Carsten De Dreu at the University of Amsterdam in the Netherlands discovered that volunteers given oxytocin showed favouritism: Dutch men became quicker to associate positive words with Dutch names than with foreign ones, for example. According to De Dreu, oxytocin drives people to care for those in their social circles and defend them from outside dangers. So, it appears that oxytocin strengthens biases, rather than promoting general goodwill, as was previously thought.</p>
                                        <p><b>E</b></p>
                                        <p class='reading-5'>There were signs of these subtleties from the start. Bartz has recently shown that in almost half of the existing research results, oxytocin influenced only certain individuals or in certain circumstances. Where once researchers took no notice of such findings, now a more nuanced understanding of oxytocin’s effects is propelling investigations down new lines. To Bartz, the key to understanding what the hormone does lies in pinpointing its core function rather than in cataloguing its seemingly endless effects. There are several hypotheses which are not mutually exclusive. Oxytocin could help to reduce anxiety and fear. Or it could simply motivate people to seek out social connections. She believes that oxytocin acts as a chemical spotlight that shines on social clues – a shift in posture, a flicker of the eyes, a dip in the voice – making people more attuned to their social environment. This would explain why it makes us more likely to look others in the eye and improves our ability to identify emotions. But it could also make things worse for people who are overly sensitive or prone to interpreting social cues in the worst light.</p>
                                        <p><b>F</b></p>
                                        <p class='reading-6'>Perhaps we should not be surprised that the oxytocin story has become more perplexing. The hormone is found in everything from octopuses to sheep, and its evolutionary roots stretch back half a billion years. ‘It’s a very simple and ancient molecule that has been co-opted for many different functions,’ says Sue Carter at the University of Illinois, Chicago, USA. ‘It affects primitive parts of the brain like the amygdala, so it’s going to have many effects on just about everything.’ Bartz agrees. ‘Oxytocin probably does some very basic things, but once you add our higher-order thinking and social situations, these basic processes could manifest in different ways depending on individual differences and context.’</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PART ONE<br>
                                            READING PASSAGE 1<br>
                                            Questions 1-13<br>
                                            You should spend about 20 minutes on Questions 1-13 which are based on Reading Passage 1 below. 
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
                                                            Questions 1-4<br>
                                                            Reading Passage 1 has six section, A-F.<br>
                                                            Which paragraph contains the following information?<br>
                                                            Write the correct letter, A-F, in boxes 1-4 on your answer sheet.<br>
                                                            PS.  You may use any letter more than once.
                                                        </p>

                                                        <p><b>1.</b> reference to research showing the beneficial effects of oxytocin on people <?= soal_isian_ielts("jawaban_reading[0]")?></p>
                                                        <p><b>2.</b> reasons why the effects of oxytocin are complex <?= soal_isian_ielts("jawaban_reading[1]")?></p>
                                                        <p><b>3.</b> mention of a period in which oxytocin attracted little scientific attention <?= soal_isian_ielts("jawaban_reading[2]")?></p>
                                                        <p><b>4.</b> reference to people ignoring certain aspects of their research data <?= soal_isian_ielts("jawaban_reading[3]")?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <center><b>Oxytocin</b></center>
                                        <i><center>The positive and negative effects of the chemical known as the ‘love hormone’</center></i>
                                        <p><b>A</b></p>
                                        <p class='reading-7'>Oxytocin is a chemical, a hormone produced in the pituitary gland in the brain. It was through various studies focusing on animals that scientists first became aware of the influence of oxytocin. They discovered that it helps reinforce the bonds between prairie voles, which mate for life, and triggers the motherly behaviour that sheep show towards their newborn lambs. It is also released by women in childbirth, strengthening the attachment between mother and baby. Few chemicals have as positive a reputation as oxytocin, which is sometimes referred to as the ‘love hormone’. One sniff of it can, it is claimed, make a person more trusting, empathetic, generous and cooperative. It is time, however, to revise this wholly optimistic view. A new wave of studies has shown that its effects vary greatly depending on the person and the circumstances, and it can impact on our social interactions for worse as well as for better.</p>
                                        <p><b>B</b></p>
                                        <p class='reading-8'>Oxytocin’s role in human behaviour first emerged in 2005. In a groundbreaking experiments, Markus Heinrichs and his colleagues at the University of Freiburg, Germany, asked volunteers to do an activity in which they could invest money with an anonymous person who was not guaranteed to be honest. The team found the participants who had sniffed oxytocin via a nasal spray beforehand invested more money than those who received a placebo instead. The study was the start of research into the effects of oxytocin on human interactions. ‘For eight years, it was quite a lonesome field,’ Heinrichs recalls. ‘Now, everyone is interested.’ These follow-up studies have shown that after a sniff of the hormone, people become more charitable, better at reading emotions on others’ faces and at communicating constructively in arguments. Together, the results fuelled the view that oxytocin universally enhanced the positive aspects of our social nature.</p>
                                        <p><b>C</b></p>
                                        <p class='reading-9'>Then, after a few years, contrasting findings began to emerge. Simone Shamay-Tsoory at the at the University of Haifa, Israel, found that when volunteers played a competitive game, those who inhaled the hormone showed more pleasure when they beat other players, and felt more envy when others won. What’s more, administering oxytocin also has sharply contrasting outcomes depending on a person’s disposition. Jennifer Bartz from Mount Sinai School of Medicine, New York, found that it improves people’s ability to read emotions, but only if they are not very socially adept to begin with. Her research also shows that oxytocin in fact reduces cooperation in subjects who are particularly anxious or sensitive to rejection.</p>
                                        <p><b>D</b></p>
                                        <p class='reading-10'>Another discovery is that oxytocin’s effects vary depending on who we are interacting with. Studies conducted by Carolyn DeClerck of the University of Antwerp, Belgium, revealed that people who had received a dose of oxytocin actually became less cooperative when dealing with complete strangers. Meanwhile, Carsten De Dreu at the University of Amsterdam in the Netherlands discovered that volunteers given oxytocin showed favouritism: Dutch men became quicker to associate positive words with Dutch names than with foreign ones, for example. According to De Dreu, oxytocin drives people to care for those in their social circles and defend them from outside dangers. So, it appears that oxytocin strengthens biases, rather than promoting general goodwill, as was previously thought.</p>
                                        <p><b>E</b></p>
                                        <p class='reading-11'>There were signs of these subtleties from the start. Bartz has recently shown that in almost half of the existing research results, oxytocin influenced only certain individuals or in certain circumstances. Where once researchers took no notice of such findings, now a more nuanced understanding of oxytocin’s effects is propelling investigations down new lines. To Bartz, the key to understanding what the hormone does lies in pinpointing its core function rather than in cataloguing its seemingly endless effects. There are several hypotheses which are not mutually exclusive. Oxytocin could help to reduce anxiety and fear. Or it could simply motivate people to seek out social connections. She believes that oxytocin acts as a chemical spotlight that shines on social clues – a shift in posture, a flicker of the eyes, a dip in the voice – making people more attuned to their social environment. This would explain why it makes us more likely to look others in the eye and improves our ability to identify emotions. But it could also make things worse for people who are overly sensitive or prone to interpreting social cues in the worst light.</p>
                                        <p><b>F</b></p>
                                        <p class='reading-12'>Perhaps we should not be surprised that the oxytocin story has become more perplexing. The hormone is found in everything from octopuses to sheep, and its evolutionary roots stretch back half a billion years. ‘It’s a very simple and ancient molecule that has been co-opted for many different functions,’ says Sue Carter at the University of Illinois, Chicago, USA. ‘It affects primitive parts of the brain like the amygdala, so it’s going to have many effects on just about everything.’ Bartz agrees. ‘Oxytocin probably does some very basic things, but once you add our higher-order thinking and social situations, these basic processes could manifest in different ways depending on individual differences and context.’</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PART ONE<br>
                                            READING PASSAGE 1<br>
                                            Questions 1-13<br>
                                            You should spend about 20 minutes on Questions 1-13 which are based on Reading Passage 1 below. 
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
                                                            Questions 5-7<br>
                                                            Look at the following research findings (Questions 5-7) and the list<br>
                                                            of researchers.
                                                        </p>

                                                        <table class="table">
                                                            <tr>
                                                                <td>
                                                                    <p><b>List of Researchers</b></p>
                                                                    <p><b>A</b> Markus Heinrichs</p>
                                                                    <p><b>B</b> Simone Shamay-Tsoory</p>
                                                                    <p><b>C</b> Jennifer Bartz</p>
                                                                    <p><b>D</b> Carolyn DeClerek</p>
                                                                    <p><b>E</b> Carsten De Dreu</p>
                                                                    <p><b>F</b> Sue Carter</p>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                        <p><i>Match each research finding with the correct researcher, A-F<br>
                                                        Write the correct letter, A-F, in boxes 5-7 on your answer sheet.</i></p>
                                                        <p><b>5.</b> People are more trusting when affected by oxytocin.<?= soal_isian_ielts("jawaban_reading[4]")?></p>
                                                        <p><b>6.</b> Oxytocin increases people’s feelings of jealousy.<?= soal_isian_ielts("jawaban_reading[5]")?></p>
                                                        <p><b>7.</b> The effect of oxytocin varies from one type of person to another.<?= soal_isian_ielts("jawaban_reading[6]")?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <center><b>Oxytocin</b></center>
                                        <i><center>The positive and negative effects of the chemical known as the ‘love hormone’</center></i>
                                        <p><b>A</b></p>
                                        <p class='reading-13'>Oxytocin is a chemical, a hormone produced in the pituitary gland in the brain. It was through various studies focusing on animals that scientists first became aware of the influence of oxytocin. They discovered that it helps reinforce the bonds between prairie voles, which mate for life, and triggers the motherly behaviour that sheep show towards their newborn lambs. It is also released by women in childbirth, strengthening the attachment between mother and baby. Few chemicals have as positive a reputation as oxytocin, which is sometimes referred to as the ‘love hormone’. One sniff of it can, it is claimed, make a person more trusting, empathetic, generous and cooperative. It is time, however, to revise this wholly optimistic view. A new wave of studies has shown that its effects vary greatly depending on the person and the circumstances, and it can impact on our social interactions for worse as well as for better.</p>
                                        <p><b>B</b></p>
                                        <p class='reading-14'>Oxytocin’s role in human behaviour first emerged in 2005. In a groundbreaking experiments, Markus Heinrichs and his colleagues at the University of Freiburg, Germany, asked volunteers to do an activity in which they could invest money with an anonymous person who was not guaranteed to be honest. The team found the participants who had sniffed oxytocin via a nasal spray beforehand invested more money than those who received a placebo instead. The study was the start of research into the effects of oxytocin on human interactions. ‘For eight years, it was quite a lonesome field,’ Heinrichs recalls. ‘Now, everyone is interested.’ These follow-up studies have shown that after a sniff of the hormone, people become more charitable, better at reading emotions on others’ faces and at communicating constructively in arguments. Together, the results fuelled the view that oxytocin universally enhanced the positive aspects of our social nature.</p>
                                        <p><b>C</b></p>
                                        <p class='reading-15'>Then, after a few years, contrasting findings began to emerge. Simone Shamay-Tsoory at the at the University of Haifa, Israel, found that when volunteers played a competitive game, those who inhaled the hormone showed more pleasure when they beat other players, and felt more envy when others won. What’s more, administering oxytocin also has sharply contrasting outcomes depending on a person’s disposition. Jennifer Bartz from Mount Sinai School of Medicine, New York, found that it improves people’s ability to read emotions, but only if they are not very socially adept to begin with. Her research also shows that oxytocin in fact reduces cooperation in subjects who are particularly anxious or sensitive to rejection.</p>
                                        <p><b>D</b></p>
                                        <p class='reading-16'>Another discovery is that oxytocin’s effects vary depending on who we are interacting with. Studies conducted by Carolyn DeClerck of the University of Antwerp, Belgium, revealed that people who had received a dose of oxytocin actually became less cooperative when dealing with complete strangers. Meanwhile, Carsten De Dreu at the University of Amsterdam in the Netherlands discovered that volunteers given oxytocin showed favouritism: Dutch men became quicker to associate positive words with Dutch names than with foreign ones, for example. According to De Dreu, oxytocin drives people to care for those in their social circles and defend them from outside dangers. So, it appears that oxytocin strengthens biases, rather than promoting general goodwill, as was previously thought.</p>
                                        <p><b>E</b></p>
                                        <p class='reading-17'>There were signs of these subtleties from the start. Bartz has recently shown that in almost half of the existing research results, oxytocin influenced only certain individuals or in certain circumstances. Where once researchers took no notice of such findings, now a more nuanced understanding of oxytocin’s effects is propelling investigations down new lines. To Bartz, the key to understanding what the hormone does lies in pinpointing its core function rather than in cataloguing its seemingly endless effects. There are several hypotheses which are not mutually exclusive. Oxytocin could help to reduce anxiety and fear. Or it could simply motivate people to seek out social connections. She believes that oxytocin acts as a chemical spotlight that shines on social clues – a shift in posture, a flicker of the eyes, a dip in the voice – making people more attuned to their social environment. This would explain why it makes us more likely to look others in the eye and improves our ability to identify emotions. But it could also make things worse for people who are overly sensitive or prone to interpreting social cues in the worst light.</p>
                                        <p><b>F</b></p>
                                        <p class='reading-18'>Perhaps we should not be surprised that the oxytocin story has become more perplexing. The hormone is found in everything from octopuses to sheep, and its evolutionary roots stretch back half a billion years. ‘It’s a very simple and ancient molecule that has been co-opted for many different functions,’ says Sue Carter at the University of Illinois, Chicago, USA. ‘It affects primitive parts of the brain like the amygdala, so it’s going to have many effects on just about everything.’ Bartz agrees. ‘Oxytocin probably does some very basic things, but once you add our higher-order thinking and social situations, these basic processes could manifest in different ways depending on individual differences and context.’</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PART ONE<br>
                                            READING PASSAGE 1<br>
                                            Questions 1-13<br>
                                            You should spend about 20 minutes on Questions 1-13 which are based on Reading Passage 1 below. 
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
                                                            Questions 8-13<br>
                                                            Complete the summary below.<br>
                                                            Choose ONE WORD ONLY from the passage for each answer.<br>
                                                            Write your answers in boxes 8-13 on your answer sheet.
                                                        </p>

                                                        <p><center><b>Oxytocin Research</b></center></p>
                                                        <p>The earliest findings about oxytocin and bonding came from research involving <b>8</b><?= soal_isian_ielts("jawaban_reading[7]")?>. It was also discovered that humans produce oxytocin during <b>9</b><?= soal_isian_ielts("jawaban_reading[8]")?> An experiment in 2005, in which participants were given either oxytocin or a <b>10</b><?= soal_isian_ielts("jawaban_reading[9]")?>, reinforced the belief that the hormone had a positive effect.</p>
                                                        <p>However, later research suggests that this is not always the case. A study at the University of Haifa where participants took part in a <b>11</b><?= soal_isian_ielts("jawaban_reading[10]")?>. revealed the negative emotions which oxytocin can trigger. A study at the University of Antwerp showed people’s lack of willingness to help <b>12</b><?= soal_isian_ielts("jawaban_reading[11]")?>. while under the influence of oxytocin. Meanwhile, research at the University of Amsterdam revealed that people who have been given oxytocin consider <b>13</b><?= soal_isian_ielts("jawaban_reading[12]")?>. that are familiar to them in their own country to have more positive associations than those from other cultures.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><b>The Falkirk Wheel</b></center></p>
                                        <p><center><b>A unique engineering achievement</b></center></p>
                                        <p class='reading-19'>The Falkirk Wheel in Scotland is the world’s first and only rotating boat lift. Opened in 2002, it is central to the ambitious £84.5m Millennium Link project to restore navigability across Scotland by reconnecting the historic waterways of the Forth & Clyde and Union Canals.</p>
                                        <p class='reading-20'>The major challenge of the project lays in the fact that the Forth & Clyde Canal is situated 35 metres below the level of the Union Canal. Historically, the two canals had been joined near the town of Falkirk by a sequence of 11 locks – enclosed sections of canal in which the water level could be raised or lowered – that stepped down across a distance of 1.5 km. This had been dismantled in 1933, thereby breaking the link. When the project was launched in 1994, the British Waterways authority were keen to create a dramatic twenty-first-century landmark which would not only be a fitting commemoration of the Millennium, but also a lasting symbol of the economic regeneration of the region.</p>
                                        <p class='reading-21'>Numerous ideas were submitted for the project, including concepts ranging from rolling eggs to tilting tanks, from giant seesaws to overhead monorails. The eventual winner was a plan for the huge rotating steel boat lift which was to become The Falkirk Wheel. The unique shape of the structure is claimed to have been inspired by various sources, both manmade and natural, most notably a Celtic double headed axe, but also the vast turning propeller of a ship, the ribcage of a whale or the spine of a fish.</p>
                                        <p class='reading-22'>The various parts of The Falkirk Wheel were all constructed and assembled, like one giant toy building set, at Butterley Engineering’s Steelworks in Derbyshire, some 400 km from Falkirk. A team there carefully assembled the 1,200 tonnes of steel, painstakingly fitting the pieces together to an accuracy of just 10 mm to ensure a perfect final fit. In the summer of 2001, the structure was then dismantled and transported on 35 lorries to Falkirk, before all being bolted back together again on the ground, and finally lifted into position in five large sections by crane. The Wheel would need to withstand immense and constantly changing stresses as it rotated, so to make the structure more robust, the steel sections were bolted rather than welded together. Over 45,000 bolt holes were matched with their bolts, and each bolt was hand-tightened.</p>
                                        <p class='reading-23'>The Wheel consists of two sets of opposing axe-shaped arms, attached about 25 metres apart to a fixed central spine. Two diametrically opposed water-filled ‘gondolas’, each with a capacity of 360,000 litres, are fitted between the ends of the arms. These gondolas always weigh the same, whether or not they are carrying boats. This is because, according to Archimedes’ principle of displacement, floating objects displace their own weight in water. So when a boat enters a gondola, the amount of water leaving the gondola weighs exactly the same as the boat. This keeps the Wheel balanced and so, despite its enormous mass, it rotates through 180° in five and a half minutes while using very little power. It takes just 1.5 kilowatt-hours (5.4 MJ) of energy to rotate the Wheel -roughly the same as boiling eight small domestic kettles of water.</p>
                                        <p class='reading-24'>Boats needing to be lifted up enter the canal basin at the level of the Forth & Clyde Canal and then enter the lower gondola of the Wheel. Two hydraulic steel gates are raised, so as to seal the gondola off from the water in the canal basin. The water between the gates is then pumped out. A hydraulic clamp, which prevents the arms of the Wheel moving while the gondola is docked, is removed, allowing the Wheel to turn. In the central machine room an array of ten hydraulic motors then begins to rotate the central axle. The axle connects to the outer arms of the Wheel, which begin to rotate at a speed of 1/8 of a revolution per minute. As the wheel rotates, the gondolas are kept in the upright position by a simple gearing system. Two eight-metre-wide cogs orbit a fixed inner cog of the same width, connected by two smaller cogs travelling in the opposite direction to the outer cogs – so ensuring that the gondolas always remain level. When the gondola reaches the top, the boat passes straight onto the aqueduct situated 24 metres above the canal basin.</p>
                                        <p class='reading-25'>The remaining 11 metres of lift needed to reach the Union Canal is achieved by means of a pair of locks. The Wheel could not be constructed to elevate boats over the full 35-metre difference between the two canals, owing to the presence of the historically important Antonine Wall, which was built by the Romans in the second century AD. Boats travel under this wall via a tunnel, then through the locks, and finally on to the Union Canal.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PART TWO<br>
                                            READING PASSAGE 2<br>
                                            You should spend about 20 minutes on Questions 14-26 which are based on Reading Passage 2 below. 
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
                                                            Questions 14-19<br>
                                                            Do the following statements agree with the information given in Reading Passage 2?<br>
                                                            In boxes 14-19 on your answer sheet, write
                                                        </p>
                                                        <p><b>TRUE</b> if the statement agrees with the information</p>
                                                        <p><b>FALSE</b> if the statement contradicts the information</p>
                                                        <p><b>NOT GIVEN</b> if there is no information on this</p>
                                                        
                                                        <?php
                                                            $data_soal_14_19 = [
                                                                [
                                                                    "no" => 14,
                                                                    "soal" => "The Falkirk Wheel has linked the Forth & Clyde Canal with the Union Canal for the first time in their history.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[13]"
                                                                ],
                                                                [
                                                                    "no" => 15,
                                                                    "soal" => "There was some opposition to the design of the Falkirk Wheel at first.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[14]"
                                                                ],
                                                                [
                                                                    "no" => 16,
                                                                    "soal" => "The Falkirk Wheel was initially put together at the location where its components were manufactured.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[15]"
                                                                ],
                                                                [
                                                                    "no" => 17,
                                                                    "soal" => "The Falkirk Wheel is the only boat lift in the world which has steel sections bolted together by hand.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[16]"
                                                                ],
                                                                [
                                                                    "no" => 18,
                                                                    "soal" => "The weight of the gondolas varies according to the size of boat being carried.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[17]"
                                                                ],
                                                                [
                                                                    "no" => 19,
                                                                    "soal" => "The construction of the Falkirk Wheel site took into account the presence of a nearby ancient monument.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[18]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_14_19 as $data_soal) :?>
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
                                        <p><center><b>The Falkirk Wheel</b></center></p>
                                        <p><center><b>A unique engineering achievement</b></center></p>
                                        <p class='reading-26'>The Falkirk Wheel in Scotland is the world’s first and only rotating boat lift. Opened in 2002, it is central to the ambitious £84.5m Millennium Link project to restore navigability across Scotland by reconnecting the historic waterways of the Forth & Clyde and Union Canals.</p>
                                        <p class='reading-27'>The major challenge of the project lays in the fact that the Forth & Clyde Canal is situated 35 metres below the level of the Union Canal. Historically, the two canals had been joined near the town of Falkirk by a sequence of 11 locks – enclosed sections of canal in which the water level could be raised or lowered – that stepped down across a distance of 1.5 km. This had been dismantled in 1933, thereby breaking the link. When the project was launched in 1994, the British Waterways authority were keen to create a dramatic twenty-first-century landmark which would not only be a fitting commemoration of the Millennium, but also a lasting symbol of the economic regeneration of the region.</p>
                                        <p class='reading-28'>Numerous ideas were submitted for the project, including concepts ranging from rolling eggs to tilting tanks, from giant seesaws to overhead monorails. The eventual winner was a plan for the huge rotating steel boat lift which was to become The Falkirk Wheel. The unique shape of the structure is claimed to have been inspired by various sources, both manmade and natural, most notably a Celtic double headed axe, but also the vast turning propeller of a ship, the ribcage of a whale or the spine of a fish.</p>
                                        <p class='reading-29'>The various parts of The Falkirk Wheel were all constructed and assembled, like one giant toy building set, at Butterley Engineering’s Steelworks in Derbyshire, some 400 km from Falkirk. A team there carefully assembled the 1,200 tonnes of steel, painstakingly fitting the pieces together to an accuracy of just 10 mm to ensure a perfect final fit. In the summer of 2001, the structure was then dismantled and transported on 35 lorries to Falkirk, before all being bolted back together again on the ground, and finally lifted into position in five large sections by crane. The Wheel would need to withstand immense and constantly changing stresses as it rotated, so to make the structure more robust, the steel sections were bolted rather than welded together. Over 45,000 bolt holes were matched with their bolts, and each bolt was hand-tightened.</p>
                                        <p class='reading-30'>The Wheel consists of two sets of opposing axe-shaped arms, attached about 25 metres apart to a fixed central spine. Two diametrically opposed water-filled ‘gondolas’, each with a capacity of 360,000 litres, are fitted between the ends of the arms. These gondolas always weigh the same, whether or not they are carrying boats. This is because, according to Archimedes’ principle of displacement, floating objects displace their own weight in water. So when a boat enters a gondola, the amount of water leaving the gondola weighs exactly the same as the boat. This keeps the Wheel balanced and so, despite its enormous mass, it rotates through 180° in five and a half minutes while using very little power. It takes just 1.5 kilowatt-hours (5.4 MJ) of energy to rotate the Wheel -roughly the same as boiling eight small domestic kettles of water.</p>
                                        <p class='reading-31'>Boats needing to be lifted up enter the canal basin at the level of the Forth & Clyde Canal and then enter the lower gondola of the Wheel. Two hydraulic steel gates are raised, so as to seal the gondola off from the water in the canal basin. The water between the gates is then pumped out. A hydraulic clamp, which prevents the arms of the Wheel moving while the gondola is docked, is removed, allowing the Wheel to turn. In the central machine room an array of ten hydraulic motors then begins to rotate the central axle. The axle connects to the outer arms of the Wheel, which begin to rotate at a speed of 1/8 of a revolution per minute. As the wheel rotates, the gondolas are kept in the upright position by a simple gearing system. Two eight-metre-wide cogs orbit a fixed inner cog of the same width, connected by two smaller cogs travelling in the opposite direction to the outer cogs – so ensuring that the gondolas always remain level. When the gondola reaches the top, the boat passes straight onto the aqueduct situated 24 metres above the canal basin.</p>
                                        <p class='reading-32'>The remaining 11 metres of lift needed to reach the Union Canal is achieved by means of a pair of locks. The Wheel could not be constructed to elevate boats over the full 35-metre difference between the two canals, owing to the presence of the historically important Antonine Wall, which was built by the Romans in the second century AD. Boats travel under this wall via a tunnel, then through the locks, and finally on to the Union Canal.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PART TWO<br>
                                            READING PASSAGE 2<br>
                                            You should spend about 20 minutes on Questions 14-26 which are based on Reading Passage 2 below. 
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
                                                            Questions 20-26<br>
                                                            Label the diagram below.<br>
                                                            Choose ONE WORD from the passage for each answer.<br>
                                                            Write your answers in boxes 20-26 on your answer sheet.
                                                        </p>
                                                        
                                                        <p><b><center>How a boat is lifted on the Falkirk Wheel</center></b></p>
                                                        <center><img src="<?= base_url()?>assets/img/003_20-26.jpeg" alt=""></center>
                                                        <p><b>20.</b> <?= soal_isian_ielts("jawaban_reading[19]")?></p>
                                                        <p><b>21.</b> <?= soal_isian_ielts("jawaban_reading[20]")?></p>
                                                        <p><b>22.</b> <?= soal_isian_ielts("jawaban_reading[21]")?></p>
                                                        <p><b>23.</b> <?= soal_isian_ielts("jawaban_reading[22]")?></p>
                                                        <p><b>24.</b> <?= soal_isian_ielts("jawaban_reading[23]")?></p>
                                                        <p><b>25.</b> <?= soal_isian_ielts("jawaban_reading[24]")?></p>
                                                        <p><b>26.</b> <?= soal_isian_ielts("jawaban_reading[25]")?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                            <p><center><b>Neuroaesthetics</b></center></p>
                                            <p class='reading-33'</p>An emerging discipline called neuroaesthetics is seeking to bring scientific objectivity to the study of art, and has already given us a better understanding of many masterpieces. The blurred imagery of Impressionist paintings seems to stimulate the brain’s amygdala, for instance. Since the amygdala plays a crucial role in our feelings, that finding might explain why many people find these pieces so moving.</p>
                                            <p class='reading-34'</p>Could the same approach also shed light on abstract twentieth-century pieces, from Mondrian’s geometrical blocks of colour, to Pollock’s seemingly haphazard arrangements of splashed paint on canvas? Sceptics believe that people claim to like such works simply because they are famous. We certainly do have an inclination to follow the crowd. When asked to make simple perceptual decisions such as matching a shape to its rotated image, for example, people often choose a definitively wrong answer if they see others doing the same. It is easy to imagine that this mentality would have even more impact on a fuzzy concept like art appreciation, where there is no right or wrong answer.</p>
                                            <p class='reading-35'</p>Angelina Hawley-Dolan, of Boston College, Massachusetts, responded to this debate by asking volunteers to view pairs of paintings – either the creations of famous abstract artists or the doodles of infants, chimps and elephants. They then had to judge which they preferred. A third of the paintings were given no captions, while many were labelled incorrectly -volunteers might think they were viewing a chimp’s messy brushstrokes when they were actually seeing an acclaimed masterpiece. In each set of trials, volunteers generally preferred the work of renowned artists, even when they believed it was by an animal or a child. It seems that the viewer can sense the artist’s vision in paintings, even if they can’t explain why.</p>
                                            <p class='reading-36'</p>Robert Pepperell, an artist based at Cardiff University, creates ambiguous works that are neither entirely abstract nor clearly representational. In one study, Pepperell and his collaborators asked volunteers to decide how ‘powerful’ they considered an artwork to be, and whether they saw anything familiar in the piece. The longer they took to answer these questions, the more highly they rated the piece under scrutiny, and the greater their neural activity. It would seem that the brain sees these images as puzzles, and the harder it is to decipher the meaning, the more rewarding is the moment of recognition.</p>
                                            <p class='reading-37'</p>And what about artists such as Mondrian, whose paintings consist exclusively of horizontal and vertical lines encasing blocks of colour? Mondrian’s works are deceptively simple, but eye-tracking studies confirm that they are meticulously composed, and that simply rotating a piece radically changes the way we view it. With the originals, volunteers’eyes tended to stay longer on certain places in the image, but with the altered versions, they would flit across a piece more rapidly. As a result, the volunteers considered the altered versions less pleasurable when they later rated the work.</p>
                                            <p class='reading-38'</p>In a similar study, Oshin Vartanian of Toronto University asked volunteers to compare original paintings with ones which he had altered by moving objects around within the frame. He found that almost everyone preferred the original, whether it was a Van Gogh still life or an abstract by Miro. Vartanian also found that changing the composition of the paintings reduced activation in those brain areas linked with meaning and interpretation.</p>
                                            <p class='reading-39'</p>In another experiment, Alex Forsythe of the University of Liverpool analysed the visual intricacy of different pieces of art, and her results suggest that many artists use a key level of detail to please the brain. Too little and the work is boring, but too much results in a kind of ‘perceptual overload’, according to Forsythe. What’s more, appealing pieces both abstract and representational, show signs of ‘fractals’ – repeated motifs recurring in different scales, fractals are common throughout nature, for example in the shapes of mountain peaks or the branches of trees. It is possible that our visual system, which evolved in the great outdoors, finds it easier to process such patterns.</p>
                                            <p class='reading-40'</p>It is also intriguing that the brain appears to process movement when we see a handwritten letter, as if we are replaying the writer’s moment of creation. This has led some to wonder whether Pollock’s works feel so dynamic because the brain reconstructs the energetic actions the artist used as he painted. This may be down to our brain’s ‘mirror neurons’, which are known to mimic others’ actions. The hypothesis will need to be thoroughly tested, however. It might even be the case that we could use neuroaesthetic studies to understand the longevity of some pieces of artwork. While the fashions of the time might shape what is currently popular, works that are best adapted to our visual system may be the most likely to linger once the trends of previous generations have been forgotten.</p>
                                            <p class='reading-41'</p>It’s still early days for the field of neuroaesthetics – and these studies are probably only a taste of what is to come. It would, however, be foolish to reduce art appreciation to a set of scientific laws. We shouldn’t underestimate the importance of the style of a particular artist, their place in history and the artistic environment of their time. Abstract art offers both a challenge and the freedom to play with different interpretations. In some ways, it’s not so different to science, where we are constantly looking for systems and decoding meaning so that we can view and appreciate the world in a new way.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PART THREE<br>
                                            READING PASSAGE 3<br>
                                            You should spend about 20 minutes on Questions 27-40, which are based on Reading Passage 190 below:
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
                                                            Questions 27-30<br>
                                                            Choose the correct letter, A, B, C or D.<br>
                                                            Write the correct letter in boxes 27-30 on your answer sheet.
                                                        </p>
                                                        
                                                        <?php
                                                            $data_soal_27_30 = [
                                                                [
                                                                    "no" => 27,
                                                                    "soal" => "In the second paragraph, the writer refers to a shape- matching test in order to illustrate",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> the subjective nature of art appreciation.",
                                                                        "<b>B.</b> the reliance of modern art on abstract forms.",
                                                                        "<b>C.</b> our tendency to be influenced by the opinions of others.",
                                                                        "<b>D.</b> a common problem encountered when processing visual data.",
                                                                    ],
                                                                    "name" => "jawaban_reading[26]"
                                                                ],
                                                                [
                                                                    "no" => 28,
                                                                    "soal" => "Angelina Hawley-Dolan’s findings indicate that people",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> mostly favour works of art which they know well.",
                                                                        "<b>B.</b> hold fixed ideas about what makes a good work of art.",
                                                                        "<b>C.</b> are often misled by their initial expectations of a work of art.",
                                                                        "<b>D.</b> have the ability to perceive the intention behind works of art.",
                                                                    ],
                                                                    "name" => "jawaban_reading[27]"
                                                                ],
                                                                [
                                                                    "no" => 29,
                                                                    "soal" => "Results of studies involving Robert Pepperell’s pieces suggest that people",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> can appreciate a painting without fully understanding it.",
                                                                        "<b>B.</b> find it satisfying to work out what a painting represents.",
                                                                        "<b>C.</b> vary widely in the time they spend looking at paintings.",
                                                                        "<b>D.</b> generally prefer representational art to abstract art.",
                                                                    ],
                                                                    "name" => "jawaban_reading[28]"
                                                                ],
                                                                [
                                                                    "no" => 30,
                                                                    "soal" => "What do the experiments described in the fifth paragraph suggest about the paintings of Mondrian?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> They are more carefully put together than they appear.",
                                                                        "<b>B.</b> They can be interpreted in a number of different ways.",
                                                                        "<b>C.</b> They challenge our assumptions about shape and colour.",
                                                                        "<b>D.</b> They are easier to appreciate than many other abstract works.",
                                                                    ],
                                                                    "name" => "jawaban_reading[29]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_27_30 as $data_soal) :?>
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
                                            <p><center><b>Neuroaesthetics</b></center></p>
                                            <p class='reading-42'</p>An emerging discipline called neuroaesthetics is seeking to bring scientific objectivity to the study of art, and has already given us a better understanding of many masterpieces. The blurred imagery of Impressionist paintings seems to stimulate the brain’s amygdala, for instance. Since the amygdala plays a crucial role in our feelings, that finding might explain why many people find these pieces so moving.</p>
                                            <p class='reading-43'</p>Could the same approach also shed light on abstract twentieth-century pieces, from Mondrian’s geometrical blocks of colour, to Pollock’s seemingly haphazard arrangements of splashed paint on canvas? Sceptics believe that people claim to like such works simply because they are famous. We certainly do have an inclination to follow the crowd. When asked to make simple perceptual decisions such as matching a shape to its rotated image, for example, people often choose a definitively wrong answer if they see others doing the same. It is easy to imagine that this mentality would have even more impact on a fuzzy concept like art appreciation, where there is no right or wrong answer.</p>
                                            <p class='reading-44'</p>Angelina Hawley-Dolan, of Boston College, Massachusetts, responded to this debate by asking volunteers to view pairs of paintings – either the creations of famous abstract artists or the doodles of infants, chimps and elephants. They then had to judge which they preferred. A third of the paintings were given no captions, while many were labelled incorrectly -volunteers might think they were viewing a chimp’s messy brushstrokes when they were actually seeing an acclaimed masterpiece. In each set of trials, volunteers generally preferred the work of renowned artists, even when they believed it was by an animal or a child. It seems that the viewer can sense the artist’s vision in paintings, even if they can’t explain why.</p>
                                            <p class='reading-45'</p>Robert Pepperell, an artist based at Cardiff University, creates ambiguous works that are neither entirely abstract nor clearly representational. In one study, Pepperell and his collaborators asked volunteers to decide how ‘powerful’ they considered an artwork to be, and whether they saw anything familiar in the piece. The longer they took to answer these questions, the more highly they rated the piece under scrutiny, and the greater their neural activity. It would seem that the brain sees these images as puzzles, and the harder it is to decipher the meaning, the more rewarding is the moment of recognition.</p>
                                            <p class='reading-46'</p>And what about artists such as Mondrian, whose paintings consist exclusively of horizontal and vertical lines encasing blocks of colour? Mondrian’s works are deceptively simple, but eye-tracking studies confirm that they are meticulously composed, and that simply rotating a piece radically changes the way we view it. With the originals, volunteers’eyes tended to stay longer on certain places in the image, but with the altered versions, they would flit across a piece more rapidly. As a result, the volunteers considered the altered versions less pleasurable when they later rated the work.</p>
                                            <p class='reading-47'</p>In a similar study, Oshin Vartanian of Toronto University asked volunteers to compare original paintings with ones which he had altered by moving objects around within the frame. He found that almost everyone preferred the original, whether it was a Van Gogh still life or an abstract by Miro. Vartanian also found that changing the composition of the paintings reduced activation in those brain areas linked with meaning and interpretation.</p>
                                            <p class='reading-48'</p>In another experiment, Alex Forsythe of the University of Liverpool analysed the visual intricacy of different pieces of art, and her results suggest that many artists use a key level of detail to please the brain. Too little and the work is boring, but too much results in a kind of ‘perceptual overload’, according to Forsythe. What’s more, appealing pieces both abstract and representational, show signs of ‘fractals’ – repeated motifs recurring in different scales, fractals are common throughout nature, for example in the shapes of mountain peaks or the branches of trees. It is possible that our visual system, which evolved in the great outdoors, finds it easier to process such patterns.</p>
                                            <p class='reading-49'</p>It is also intriguing that the brain appears to process movement when we see a handwritten letter, as if we are replaying the writer’s moment of creation. This has led some to wonder whether Pollock’s works feel so dynamic because the brain reconstructs the energetic actions the artist used as he painted. This may be down to our brain’s ‘mirror neurons’, which are known to mimic others’ actions. The hypothesis will need to be thoroughly tested, however. It might even be the case that we could use neuroaesthetic studies to understand the longevity of some pieces of artwork. While the fashions of the time might shape what is currently popular, works that are best adapted to our visual system may be the most likely to linger once the trends of previous generations have been forgotten.</p>
                                            <p class='reading-50'</p>It’s still early days for the field of neuroaesthetics – and these studies are probably only a taste of what is to come. It would, however, be foolish to reduce art appreciation to a set of scientific laws. We shouldn’t underestimate the importance of the style of a particular artist, their place in history and the artistic environment of their time. Abstract art offers both a challenge and the freedom to play with different interpretations. In some ways, it’s not so different to science, where we are constantly looking for systems and decoding meaning so that we can view and appreciate the world in a new way.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PART THREE<br>
                                            READING PASSAGE 3<br>
                                            You should spend about 20 minutes on Questions 27-40, which are based on Reading Passage 190 below:
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
                                                            Questions 31-33<br>
                                                            Complete the summary using the list of words, A-H, below.<br>
                                                            Write the correct letters, A-H, in boxes 31-33 on your answer sheet.
                                                        </p>
                                                        
                                                        <p><center><b>Art and the Brain</b></center></p>
                                                        <p>The discipline of neuroaesthetics aims to bring scientific objectivity to the study of art. Neurological studies of the brain, for example, demonstrate the impact which Impressionist paintings have on our <b>31</b> <?= soal_isian_ielts("jawaban_reading[30]")?>. Alex Forsythe of the University of Liverpool believes many artists give their works the precise degree of <b>32</b> <?= soal_isian_ielts("jawaban_reading[31]")?>. which most appeals to the viewer’s brain. She also observes that pleasing works of art often contain certain repeated <b>33</b> <?= soal_isian_ielts("jawaban_reading[32]")?>. which occur frequently in the natural world.</p>

                                                        <table class="table">
                                                            <tr>
                                                                <td>A. interpretation</td>
                                                                <td>B. complexity</td>
                                                                <td>C. emotions</td>
                                                            </tr>
                                                            <tr>
                                                                <td>D. movements</td>
                                                                <td>E. skill</td>
                                                                <td>F. layout</td>
                                                            </tr>
                                                            <tr>
                                                                <td>G. concern</td>
                                                                <td>H. images</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                            <p><center><b>Neuroaesthetics</b></center></p>
                                            <p class='reading-51'</p>An emerging discipline called neuroaesthetics is seeking to bring scientific objectivity to the study of art, and has already given us a better understanding of many masterpieces. The blurred imagery of Impressionist paintings seems to stimulate the brain’s amygdala, for instance. Since the amygdala plays a crucial role in our feelings, that finding might explain why many people find these pieces so moving.</p>
                                            <p class='reading-52'</p>Could the same approach also shed light on abstract twentieth-century pieces, from Mondrian’s geometrical blocks of colour, to Pollock’s seemingly haphazard arrangements of splashed paint on canvas? Sceptics believe that people claim to like such works simply because they are famous. We certainly do have an inclination to follow the crowd. When asked to make simple perceptual decisions such as matching a shape to its rotated image, for example, people often choose a definitively wrong answer if they see others doing the same. It is easy to imagine that this mentality would have even more impact on a fuzzy concept like art appreciation, where there is no right or wrong answer.</p>
                                            <p class='reading-53'</p>Angelina Hawley-Dolan, of Boston College, Massachusetts, responded to this debate by asking volunteers to view pairs of paintings – either the creations of famous abstract artists or the doodles of infants, chimps and elephants. They then had to judge which they preferred. A third of the paintings were given no captions, while many were labelled incorrectly -volunteers might think they were viewing a chimp’s messy brushstrokes when they were actually seeing an acclaimed masterpiece. In each set of trials, volunteers generally preferred the work of renowned artists, even when they believed it was by an animal or a child. It seems that the viewer can sense the artist’s vision in paintings, even if they can’t explain why.</p>
                                            <p class='reading-54'</p>Robert Pepperell, an artist based at Cardiff University, creates ambiguous works that are neither entirely abstract nor clearly representational. In one study, Pepperell and his collaborators asked volunteers to decide how ‘powerful’ they considered an artwork to be, and whether they saw anything familiar in the piece. The longer they took to answer these questions, the more highly they rated the piece under scrutiny, and the greater their neural activity. It would seem that the brain sees these images as puzzles, and the harder it is to decipher the meaning, the more rewarding is the moment of recognition.</p>
                                            <p class='reading-55'</p>And what about artists such as Mondrian, whose paintings consist exclusively of horizontal and vertical lines encasing blocks of colour? Mondrian’s works are deceptively simple, but eye-tracking studies confirm that they are meticulously composed, and that simply rotating a piece radically changes the way we view it. With the originals, volunteers’eyes tended to stay longer on certain places in the image, but with the altered versions, they would flit across a piece more rapidly. As a result, the volunteers considered the altered versions less pleasurable when they later rated the work.</p>
                                            <p class='reading-56'</p>In a similar study, Oshin Vartanian of Toronto University asked volunteers to compare original paintings with ones which he had altered by moving objects around within the frame. He found that almost everyone preferred the original, whether it was a Van Gogh still life or an abstract by Miro. Vartanian also found that changing the composition of the paintings reduced activation in those brain areas linked with meaning and interpretation.</p>
                                            <p class='reading-57'</p>In another experiment, Alex Forsythe of the University of Liverpool analysed the visual intricacy of different pieces of art, and her results suggest that many artists use a key level of detail to please the brain. Too little and the work is boring, but too much results in a kind of ‘perceptual overload’, according to Forsythe. What’s more, appealing pieces both abstract and representational, show signs of ‘fractals’ – repeated motifs recurring in different scales, fractals are common throughout nature, for example in the shapes of mountain peaks or the branches of trees. It is possible that our visual system, which evolved in the great outdoors, finds it easier to process such patterns.</p>
                                            <p class='reading-58'</p>It is also intriguing that the brain appears to process movement when we see a handwritten letter, as if we are replaying the writer’s moment of creation. This has led some to wonder whether Pollock’s works feel so dynamic because the brain reconstructs the energetic actions the artist used as he painted. This may be down to our brain’s ‘mirror neurons’, which are known to mimic others’ actions. The hypothesis will need to be thoroughly tested, however. It might even be the case that we could use neuroaesthetic studies to understand the longevity of some pieces of artwork. While the fashions of the time might shape what is currently popular, works that are best adapted to our visual system may be the most likely to linger once the trends of previous generations have been forgotten.</p>
                                            <p class='reading-59'</p>It’s still early days for the field of neuroaesthetics – and these studies are probably only a taste of what is to come. It would, however, be foolish to reduce art appreciation to a set of scientific laws. We shouldn’t underestimate the importance of the style of a particular artist, their place in history and the artistic environment of their time. Abstract art offers both a challenge and the freedom to play with different interpretations. In some ways, it’s not so different to science, where we are constantly looking for systems and decoding meaning so that we can view and appreciate the world in a new way.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PART THREE<br>
                                            READING PASSAGE 3<br>
                                            You should spend about 20 minutes on Questions 27-40, which are based on Reading Passage 190 below:
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
                                                            Questions 34-39<br>
                                                            Do the following statements agree with the views of the writer in Reading Passage 3?<br>
                                                            In boxes 34-39 on your answer sheet, write!
                                                        </p>
                                                        
                                                        <p><b>TRUE</b> if the statement agrees with the information</p>
                                                        <p><b>FALSE</b> if the statement contradicts the information</p>
                                                        <p><b>NOT GIVEN</b> if there is no information on this</p>
                                                        
                                                        <?php
                                                            $data_soal_34_39 = [
                                                                [
                                                                    "no" => 34,
                                                                    "soal" => "Forsythe’s findings contradicted previous beliefs on the function of ‘fractals’ in art.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[33]"
                                                                ],
                                                                [
                                                                    "no" => 35,
                                                                    "soal" => "Certain ideas regarding the link between ‘mirror neurons’ and art appreciation require further   verification.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[34]"
                                                                ],
                                                                [
                                                                    "no" => 36,
                                                                    "soal" => "People’s taste in paintings depends entirely on the current artistic trends of the period.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[35]"
                                                                ],
                                                                [
                                                                    "no" => 37,
                                                                    "soal" => "Scientists should seek to define the precise rules which govern people’s reactions to works of art.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[36]"
                                                                ],
                                                                [
                                                                    "no" => 38,
                                                                    "soal" => "Art appreciation should always involve taking into consideration the cultural context in which an artist worked.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[37]"
                                                                ],
                                                                [
                                                                    "no" => 39,
                                                                    "soal" => "It is easier to find meaning in the field of science than in that of art.",
                                                                    "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                                                    "name" => "jawaban_reading[38]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_34_39 as $data_soal) :?>
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
                                            <p><center><b>Neuroaesthetics</b></center></p>
                                            <p class='reading-60'</p>An emerging discipline called neuroaesthetics is seeking to bring scientific objectivity to the study of art, and has already given us a better understanding of many masterpieces. The blurred imagery of Impressionist paintings seems to stimulate the brain’s amygdala, for instance. Since the amygdala plays a crucial role in our feelings, that finding might explain why many people find these pieces so moving.</p>
                                            <p class='reading-61'</p>Could the same approach also shed light on abstract twentieth-century pieces, from Mondrian’s geometrical blocks of colour, to Pollock’s seemingly haphazard arrangements of splashed paint on canvas? Sceptics believe that people claim to like such works simply because they are famous. We certainly do have an inclination to follow the crowd. When asked to make simple perceptual decisions such as matching a shape to its rotated image, for example, people often choose a definitively wrong answer if they see others doing the same. It is easy to imagine that this mentality would have even more impact on a fuzzy concept like art appreciation, where there is no right or wrong answer.</p>
                                            <p class='reading-62'</p>Angelina Hawley-Dolan, of Boston College, Massachusetts, responded to this debate by asking volunteers to view pairs of paintings – either the creations of famous abstract artists or the doodles of infants, chimps and elephants. They then had to judge which they preferred. A third of the paintings were given no captions, while many were labelled incorrectly -volunteers might think they were viewing a chimp’s messy brushstrokes when they were actually seeing an acclaimed masterpiece. In each set of trials, volunteers generally preferred the work of renowned artists, even when they believed it was by an animal or a child. It seems that the viewer can sense the artist’s vision in paintings, even if they can’t explain why.</p>
                                            <p class='reading-63'</p>Robert Pepperell, an artist based at Cardiff University, creates ambiguous works that are neither entirely abstract nor clearly representational. In one study, Pepperell and his collaborators asked volunteers to decide how ‘powerful’ they considered an artwork to be, and whether they saw anything familiar in the piece. The longer they took to answer these questions, the more highly they rated the piece under scrutiny, and the greater their neural activity. It would seem that the brain sees these images as puzzles, and the harder it is to decipher the meaning, the more rewarding is the moment of recognition.</p>
                                            <p class='reading-64'</p>And what about artists such as Mondrian, whose paintings consist exclusively of horizontal and vertical lines encasing blocks of colour? Mondrian’s works are deceptively simple, but eye-tracking studies confirm that they are meticulously composed, and that simply rotating a piece radically changes the way we view it. With the originals, volunteers’eyes tended to stay longer on certain places in the image, but with the altered versions, they would flit across a piece more rapidly. As a result, the volunteers considered the altered versions less pleasurable when they later rated the work.</p>
                                            <p class='reading-65'</p>In a similar study, Oshin Vartanian of Toronto University asked volunteers to compare original paintings with ones which he had altered by moving objects around within the frame. He found that almost everyone preferred the original, whether it was a Van Gogh still life or an abstract by Miro. Vartanian also found that changing the composition of the paintings reduced activation in those brain areas linked with meaning and interpretation.</p>
                                            <p class='reading-66'</p>In another experiment, Alex Forsythe of the University of Liverpool analysed the visual intricacy of different pieces of art, and her results suggest that many artists use a key level of detail to please the brain. Too little and the work is boring, but too much results in a kind of ‘perceptual overload’, according to Forsythe. What’s more, appealing pieces both abstract and representational, show signs of ‘fractals’ – repeated motifs recurring in different scales, fractals are common throughout nature, for example in the shapes of mountain peaks or the branches of trees. It is possible that our visual system, which evolved in the great outdoors, finds it easier to process such patterns.</p>
                                            <p class='reading-67'</p>It is also intriguing that the brain appears to process movement when we see a handwritten letter, as if we are replaying the writer’s moment of creation. This has led some to wonder whether Pollock’s works feel so dynamic because the brain reconstructs the energetic actions the artist used as he painted. This may be down to our brain’s ‘mirror neurons’, which are known to mimic others’ actions. The hypothesis will need to be thoroughly tested, however. It might even be the case that we could use neuroaesthetic studies to understand the longevity of some pieces of artwork. While the fashions of the time might shape what is currently popular, works that are best adapted to our visual system may be the most likely to linger once the trends of previous generations have been forgotten.</p>
                                            <p class='reading-68'</p>It’s still early days for the field of neuroaesthetics – and these studies are probably only a taste of what is to come. It would, however, be foolish to reduce art appreciation to a set of scientific laws. We shouldn’t underestimate the importance of the style of a particular artist, their place in history and the artistic environment of their time. Abstract art offers both a challenge and the freedom to play with different interpretations. In some ways, it’s not so different to science, where we are constantly looking for systems and decoding meaning so that we can view and appreciate the world in a new way.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            PART THREE<br>
                                            READING PASSAGE 3<br>
                                            You should spend about 20 minutes on Questions 27-40, which are based on Reading Passage 190 below:
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
                                                            Question 40<br>
                                                            Choose the correct letter; A, B, C or D.<br>
                                                            Write the correct letter in box 40 on your answer sheet.!
                                                        </p>
                                                        
                                                        <?php
                                                            $data_soal_40 = [
                                                                [
                                                                    "no" => 40,
                                                                    "soal" => "What would be the most appropriate subtitle for the article?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> Some scientific insights into how the brain responds to abstract art",
                                                                        "<b>B.</b> Recent studies focusing on the neural activity of abstract artists",
                                                                        "<b>C.</b> A comparison of the neurological bases of abstract and representational art",
                                                                        "<b>D.</b> How brain research has altered public opinion about abstract art",
                                                                    ],
                                                                    "name" => "jawaban_reading[39]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_40 as $data_soal) :?>
                                                            <?= soal_pg_ielts($data_soal);?>
                                                        <?php endforeach;?>
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

                                        <center><img src="<?= base_url()?>assets/img/writing-003.png" alt=""></center>

                                        <p><i>The diagrams show a structure that is used to generate electricity from wave power. Write a report for a university lecturer describing the information Write at least 150 words.</i></p>
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
                                                    Many museums and historical sites are mainly visited by tourists but not local people. Why is this the case and what can be done to attract more local people to visit these places?
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

    for (let i = 1; i < 100; i++) {
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