<?= $this->extend('pages/soal/layout/soal_layout') ?>

<?= $this->section('sesi-listening') ?>
    <div class="card mb-3">
        <div class="card-body">
            <center>
                <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('public/assets/myaudio/transforme/ac-03/ac-03.mp3?t='.time())?>" type="audio/mpeg"></audio>
                <progress id="seekbar-1" value="0" max="1" style="width:100%;"></progress><br>
                <button class="btn btn-success btnAudio" data-id="1" type="button">play</button>
                <p><small class="text-danger"><i>note : The audio can only be played once</i></small></p>
            </center>
        </div>
    </div>

    <?php $i = 0;?>
    <!-- 1-10 -->
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <center><b>IELTS LISTENING PRE-TEST ACADEMIC</b></center>
            <p class="question">
                SECTION 1 | Questions 1-10<br>
            </p>
            <p>
                <b>Questions 1-5</b><br>
                <i>Complete the table below.</i><br>
                <i>Write <b>NO MORE THAN THREE WORDS AND/OR A NUMBER</b> for each answer.</i>
            </p>

            <center>
                <table class="tableSoal w-75 mb-3">
                    <tr>
                        <td>
                            <p><center><b>LIBRARY INFORMATION</b></center></p>
                            <div class="text-center">
                                <p>Example &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Answer </p>
                                <p>Minimum joining age: &emsp;&emsp;&emsp;18 years</p>
                            </div>
                            
                            <p>For registration, must take </p>
                            <p>&#8226; two <b>1)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> and</p>
                            <p class="mb-5">&#8226; two forms of I.D. e.g. driving licence, <b>2)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> </p>
                            
                            <p>Cost to join per year (without current student card): <b>3)</b> £ <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>
                            <p>Number of items allowed: (members of public) <b>4)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>
                            <p>Loan times: four weeks</p>
                            <p>Fines start at <b>5)</b> £ <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>
                            <p>Computers can be booked up to <b>6)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> hours in advance</p>
                            <p>Library holds most national papers, all <b>7)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> and magazines</p>
                            <p class="mb-5">Need <b>8)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> to use photocopier</p>

                            <p>Creative Writing class</p>
                            <p>&#8226; tutor is John <b>9)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> </p>
                            <p>&#8226; held on <b>10)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> evenings</p>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <!-- 11 - 20 -->
    <?php $i = 10?>
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <p class="question">
                SECTION 2 | Question 11-20<br>
            </p>
            <p>
                <b>Questions 11-15</b><br>
                <i>Choose the correct letter, <b>A</b>, <b>B</b> or <b>C</b>.</i><br>
            </p>

            <center><h4>BICYCLES FOR THE WORLD</h4></center>

            <?php
                $data_soal_11_15  = [
                    [
                        "no" => 11,
                        "soal" => "In 1993 Dan Pearman went to Ecuador",
                        "pilihan" => [
                            "<b>A.</b> as a tourist guide.",
                            "<b>B.</b> as part of his studies.",
                            "<b>C.</b> as a voluntary worker."
                        ],
                        "name" => "jawaban_listening[10]"
                    ],
                    [
                        "no" => 12,
                        "soal" => "Dan's neighbour was successful in business because he",
                        "pilihan" => [
                            "<b>A.</b> employed carpenters from the area.",
                            "<b>B.</b> was the most skilled craftsman in the town.",
                            "<b>C.</b> found it easy to reach customers."
                        ],
                        "name" => "jawaban_listening[11]"
                    ],
                    [
                        "no" => 13,
                        "soal" => "Dan says the charity relies on",
                        "pilihan" => [
                            "<b>A.</b> getting enough bicycles to send regularly.",
                            "<b>B.</b> finding new areas which need the bicycles.",
                            "<b>C.</b> charging for the bicycles it sends abroad."
                        ],
                        "name" => "jawaban_listening[12]"
                    ],
                    [
                        "no" => 14,
                        "soal" => "What does Dan say about the town of Rivas?",
                        "pilihan" => [
                            "<b>A.</b> It has received the greatest number of bikes.",
                            "<b>B.</b> It has almost as many bikes as Amsterdam.",
                            "<b>C.</b> Its economy has been totally transformed."
                        ],
                        "name" => "jawaban_listening[13]"
                    ],
                    [
                        "no" => 15,
                        "soal" => "What problem did the charity face in August 2000?",
                        "pilihan" => [
                            "<b>A.</b> It couldn't meet its overheads.",
                            "<b>B.</b> It had to delay sending the bikes.",
                            "<b>C.</b> It was criticised in the British media."
                        ],
                        "name" => "jawaban_listening[14]"
                    ],
                ];
            ?>
            <?php foreach ($data_soal_11_15 as $data_soal) :?>
                <?= soal_pg_ielts($data_soal)?>
            <?php endforeach;?>

            <?php $i = 15?>
            <div class="mb-5"></div>

            <p>
                <b>Questions 16 and 17</b><br>
                <i>Answer the questions below.</i><br>
                <i>Write <b>NO MORE THAN ONE WORD OR A NUMBER</b> for each answer.</i>
            </p>

            <p><b>16)</b> How much money did the charity receive when it won an award? <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>
            <p><b>17)</b> What is the charity currently hoping to buy?  <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>

            <div class="mb-5"></div>

            <p>
                <b>Questions 18 - 20</b><br>
                <i>
                    Choose <b>THREE</b> letters <b>A-G</b>.<br>
                    Which <b>THREE</b> things can the general public do to help the charity Pedal Power?
                </i>
            </p>

            <center>
                <table class="tableSoal w-40 mb-3">
                    <tr>
                        <td>
                            <p><b>A.</b> organise a bicycle collection</p>
                            <p><b>B.</b> repair the donated bikes</p>
                            <p><b>C.</b> donate their unwanted tools</p>
                            <p><b>D.</b> do voluntary work in its office</p>
                            <p><b>E.</b> hold an event to raise money</p>
                            <p><b>F.</b> identify areas that need bikes</p>
                            <p><b>G.</b> write to the government</p>
                        </td>
                    </tr>
                </table>
            </center>

            <p><b>18)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>
            <p><b>19)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>
            <p><b>20)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>
        </div>
    </div>
    
    <!-- 21 - 30 -->
    <?php $i = 20?>
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <p class="question">
                SECTION 3 | Question 21-30<br>
            </p>
            <p>
                <b>Questions 21-30</b><br>
                <i>
                    Complete the table below.<br>
                    Write <b>NO MORE THAN THREE WORD AND/OR A NUMBER</b> for each answer.
                </i>
            </p>

            <center>
                <table class="tableSoal w-100 mb-3">
                    <tr>
                        <td colspan="3"><h4><center>'Student Life' video project</center></h4></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <center><b>Cristina</b></center>
                        </td>
                        <td>
                            <center><b>Ibrahim</b></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Enjoyed:</b>
                        </td>
                        <td>
                            <p>•  using the camera</p>
                            <p>•  going to British <b>21</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>
                        </td>
                        <td>
                            contact with students doing other courses (has asked some to <b>22</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> with him)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Most useful language practice:</b>
                        </td>
                        <td>
                            <p>•  listening to instructions</p>
                            <p>•  learning <b>23)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> vocabulary</p>
                        </td>
                        <td>
                            <p>listening to British students'</p>
                            <p>language because of</p>
                            <p>- normal speed</p>
                            <p>- large amount of <b>24)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>General usefulness:</b>
                        </td>
                        <td>
                            <p>•  operating video camera</p>
                            <p>•  working with other people:</p>
                            <p>- learning about <b>25)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> </p>
                            <p>- compromising</p>
                            <p>- <b>26)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> people who have different views</p>
                        </td>
                        <td>
                            the importance of <b>27)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Things to do differently in future:</b>
                        </td>
                        <td>
                            <p>•  decide when to <b>28)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> each stage at the beginning</p>
                            <p>•  make more effort to <b>29)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> with the camera</p>
                        </td>
                        <td>
                            don't make the film too <b>30)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <?php $i = 30?>
    <!-- 31 - 40 -->
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <center><b>IELTS LISTENING PRE-TEST ACADEMIC</b></center>
            <p class="question">
                SECTION 4 | Question 31-40<br>
            </p>
            <p>
                <i>
                    <b>Questions 31-40</b><br>
                    Complete the sentences below.<br>
                    Write <b>NO MORE THAN THREE WORDS AND/OR A NUMBER</b> for each answer.
                </i>
            </p>

            <center>
                <table class="tableSoal w-75 mb-3">
                    <tr>
                        <td>
                            <p><center><b>ANTARCTICA</b></center></p>
                            
                            <p><b>GEOGRAPHY</b></p>
                            <p>•  world's highest, coldest and windiest continent</p>
                            <p>•  more than <b>31</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> times as big as the UK</p>
                            <p>•  most of the area is classified as <b>32</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?></p>
                            <p class="mt-5"><b>RESEARCH STATIONS</b></p>
                            <p>•  international teams work together</p>
                            <p>•  <b>33</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> is integrated with technical support</p>
                            <p>•  stations contain accommodation, work areas, a kitchen, a <b>34)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> and a gym</p>
                            <p>•  supplies were brought to Zero One station by sledge from a <b>35)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> at the edge of the ice 15 km away</p>
                            <p>•  problem of snow build-ups solved by building stations on <b>36)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> with adjustable legs</p>
                            <p class="mt-5"><b>FOOD AND DIET</b></p>
                            <p>•  average daily requirement for an adult in Antarctica is approximately <b>37)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> kilocalories</p>
                            <p>•  rations for field work prepared by process of freeze-drying</p>
                            <p class="mt-5"><b>RESEARCH</b></p>
                            <p>The most important research focuses on climate change, including</p>
                            <p>-  measuring changes in the ice-cap (because of effects on sea levels and <b>38)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?>)</p>
                            <p>-  monitoring the hole in the ozone layer</p>
                            <p>-  analysing air from bubbles in ice to measure <b>39)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> caused by human activity</p>
                            <p class="mt-5"><b>WORK OPPORTUNITIES</b></p>
                            <p>Many openings for <b>40)</b> <?= soal_isian_ielts("jawaban_listening[$i]"); $i++?> people including</p>
                            <p>-  research assistants</p>
                            <p>-  administrative and technical positions</p>
                            
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>
<?= $this->endSection()?>

<?= $this->section('sesi-reading') ?>
    <?php
        $text_1 = "
            <h6 class='mb-0'>
                <center>BAKELITE</center>
                <center><u>The birth of modem plastics</u></center>
            </h6>
            
            <div class='reading-1 mt-3'>
                ((p1))
                    In 1907, Leo Hendrick Baekeland, a Belgian scientist working in New York, discovered and patented a revolutionary new synthetic material. His invention, which he named 'Bakelite', was of enormous technological importance, and effectively launched the modern plastics industry.
                ((/p1))
                ((p2))
                    The term 'plastic' comes from the Greek plassein, meaning 'to mould' Some plastics are derived from natural sources, some are semi-synthetic (the result of chemical action on a natural substance), and some are entirely synthetic, that is, chemically engineered from the constituents of coal or oil. Some are 'thermoplastic', which means that, like candle wax, they melt when heated and can then be reshaped. Others are 'thermosetting': like eggs, they cannot revert to their original viscous state, and their shape is thus fixed for ever Bakelite had the distinction of being the first totally synthetic thermosetting plastic.
                ((/p2))
                ((p3))
                    The history of today's plastics begins with the discovery of a series of semi-synthetic thermoplastic materials in the mid-nineteenth century. The impetus behind the development of these early plastics was generated by a number of factors - immense technological progress in the domain of chemistry, coupled with wider cultural changes, and the pragmatic need to find acceptable substitutes for dwindling supplies of 'luxury' materials such as tortoiseshell and ivory.
                ((/p3))
                ((p4))
                    Baekeland's interest in plastics began in 1885 when, as a young chemistry student in Belgium, he embarked on research into phenolic resins, the group of sticky substances produced when phenol (carbolic acid) combines with an aldehyde (a volatile fluid similar to alcohol). He soon abandoned the subject, however, only returning to it some years later. by 1905 he was a wealthy New Yorker, having recently made his fortune with the invention of a new photographic paper. While Baekeland had been busily amassing dollars, some advances had been made in the development of plastics. The years 1899 and 1900 had seen the patenting of the first semi-synthetic thermosetting material that could be manufactured on an industrial scale. In purely scientific terms, Baekeland's major contribution to the field is not so much the actual discovery of the material to which he gave his name, but rather the method by which a reaction between phenol and formaldehyde could be controlled, thus making possible its preparation on a commercial basis. On 13 July 1907, Baekeland took out his famous patent describing this preparation, the essential features of which are still in use today.
                ((/p4))
                ((p5))
                    The original patent outlined a three-stage process, in which phenol and formaldehyde (from wood or coal) were initially combined under vacuum inside a large egg-shaped kettle. The result was a resin known as Novalak, which became soluble and malleable when heated. The resin was allowed to cool in shallow trays until it hardened, and then broken up and ground into powder. Other substances were then introduced: including fillers, such as woodflour, asbestos or cotton, which increase strength and moisture resistance, catalysts (substances to speed up the reaction between two chemicals without joining to either) and hexa, a compound of ammonia and formaldehyde which supplied the additional formaldehyde necessary to form a thermosetting resin. This resin was then left to cool and harden, and ground up a second time. The resulting granular powder was raw Bakelite, ready to be made into a vast range of manufactured objects. In the last stage, the heated Bakelite was poured into a hollow mould of the required shape and subjected to extreme heat and pressure, thereby 'setting' its form for life.
                ((/p5))
                ((p6))
                    The design of Bakelite objects, everything from earrings to television sets, was governed to a large extent by the technical requirements of the moulding process. The object could not be designed so that it was locked into the mould and therefore difficult to extract. A common general rule was that objects should taper towards the deepest part of the mould, and if necessary the product was moulded in separate pieces. Moulds had to be carefully designed so that the molten Bakelite would flow evenly and completely into the mould. Sharp corners proved impractical and were thus avoided, giving rise to the smooth, 'streamlined' style popular in the 1930s. The thickness of the walls of the mould was also crucial’ thick walls took longer to cool and harden, a factor which had to be considered by the designer in order to make the most efficient use of machines.
                ((/p6))
                ((p7))
                    Baekeland's invention, although treated with disdain in its early years, went on to enjoy an unparalleled popularity which lasted throughout the first half of the twentieth century. It became the wonder product of the new world of industrial expansion - 'the material of a thousand uses'. Being both non-porous and heat-resistant, Bakelite kitchen goods were promoted as being germ-free and sterilisable. Electrical manufacturers seized on its insulating properties, and consumers everywhere relished its dazzling array of shades, delighted that they were now, at last, no longer restricted to the wood tones and drab browns of the pre-plastic era. It then fell from favour again during the 1950s, and was despised and destroyed in vast quantities. Recently, however, it has been experiencing something of a renaissance, with renewed demand for original Bakelite objects in the collectors' marketplace, and museums, societies and dedicated individuals once again appreciating the style and originality of this innovative material.
                ((/p7))
            </div>
        ";

        $text_2 = "
            <h6 class='mb-0'>
                <center>BAKELITE</center>
                <center><u>The birth of modem plastics</u></center>
            </h6>
            
            <div class='reading-2 mt-3'>
                ((p1))
                    In 1907, Leo Hendrick Baekeland, a Belgian scientist working in New York, discovered and patented a revolutionary new synthetic material. His invention, which he named 'Bakelite', was of enormous technological importance, and effectively launched the modern plastics industry.
                ((/p1))
                ((p2))
                    The term 'plastic' comes from the Greek plassein, meaning 'to mould' Some plastics are derived from natural sources, some are semi-synthetic (the result of chemical action on a natural substance), and some are entirely synthetic, that is, chemically engineered from the constituents of coal or oil. Some are 'thermoplastic', which means that, like candle wax, they melt when heated and can then be reshaped. Others are 'thermosetting': like eggs, they cannot revert to their original viscous state, and their shape is thus fixed for ever Bakelite had the distinction of being the first totally synthetic thermosetting plastic.
                ((/p2))
                ((p3))
                    The history of today's plastics begins with the discovery of a series of semi-synthetic thermoplastic materials in the mid-nineteenth century. The impetus behind the development of these early plastics was generated by a number of factors - immense technological progress in the domain of chemistry, coupled with wider cultural changes, and the pragmatic need to find acceptable substitutes for dwindling supplies of 'luxury' materials such as tortoiseshell and ivory.
                ((/p3))
                ((p4))
                    Baekeland's interest in plastics began in 1885 when, as a young chemistry student in Belgium, he embarked on research into phenolic resins, the group of sticky substances produced when phenol (carbolic acid) combines with an aldehyde (a volatile fluid similar to alcohol). He soon abandoned the subject, however, only returning to it some years later. by 1905 he was a wealthy New Yorker, having recently made his fortune with the invention of a new photographic paper. While Baekeland had been busily amassing dollars, some advances had been made in the development of plastics. The years 1899 and 1900 had seen the patenting of the first semi-synthetic thermosetting material that could be manufactured on an industrial scale. In purely scientific terms, Baekeland's major contribution to the field is not so much the actual discovery of the material to which he gave his name, but rather the method by which a reaction between phenol and formaldehyde could be controlled, thus making possible its preparation on a commercial basis. On 13 July 1907, Baekeland took out his famous patent describing this preparation, the essential features of which are still in use today.
                ((/p4))
                ((p5))
                    The original patent outlined a three-stage process, in which phenol and formaldehyde (from wood or coal) were initially combined under vacuum inside a large egg-shaped kettle. The result was a resin known as Novalak, which became soluble and malleable when heated. The resin was allowed to cool in shallow trays until it hardened, and then broken up and ground into powder. Other substances were then introduced: including fillers, such as woodflour, asbestos or cotton, which increase strength and moisture resistance, catalysts (substances to speed up the reaction between two chemicals without joining to either) and hexa, a compound of ammonia and formaldehyde which supplied the additional formaldehyde necessary to form a thermosetting resin. This resin was then left to cool and harden, and ground up a second time. The resulting granular powder was raw Bakelite, ready to be made into a vast range of manufactured objects. In the last stage, the heated Bakelite was poured into a hollow mould of the required shape and subjected to extreme heat and pressure, thereby 'setting' its form for life.
                ((/p5))
                ((p6))
                    The design of Bakelite objects, everything from earrings to television sets, was governed to a large extent by the technical requirements of the moulding process. The object could not be designed so that it was locked into the mould and therefore difficult to extract. A common general rule was that objects should taper towards the deepest part of the mould, and if necessary the product was moulded in separate pieces. Moulds had to be carefully designed so that the molten Bakelite would flow evenly and completely into the mould. Sharp corners proved impractical and were thus avoided, giving rise to the smooth, 'streamlined' style popular in the 1930s. The thickness of the walls of the mould was also crucial’ thick walls took longer to cool and harden, a factor which had to be considered by the designer in order to make the most efficient use of machines.
                ((/p6))
                ((p7))
                    Baekeland's invention, although treated with disdain in its early years, went on to enjoy an unparalleled popularity which lasted throughout the first half of the twentieth century. It became the wonder product of the new world of industrial expansion - 'the material of a thousand uses'. Being both non-porous and heat-resistant, Bakelite kitchen goods were promoted as being germ-free and sterilisable. Electrical manufacturers seized on its insulating properties, and consumers everywhere relished its dazzling array of shades, delighted that they were now, at last, no longer restricted to the wood tones and drab browns of the pre-plastic era. It then fell from favour again during the 1950s, and was despised and destroyed in vast quantities. Recently, however, it has been experiencing something of a renaissance, with renewed demand for original Bakelite objects in the collectors' marketplace, and museums, societies and dedicated individuals once again appreciating the style and originality of this innovative material.
                ((/p7))
            </div>
        ";

        $text_3 = "
            <h6 class='mb-0'>
                <center>BAKELITE</center>
                <center><u>The birth of modem plastics</u></center>
            </h6>
            
            <div class='reading-3 mt-3'>
                ((p1))
                    In 1907, Leo Hendrick Baekeland, a Belgian scientist working in New York, discovered and patented a revolutionary new synthetic material. His invention, which he named 'Bakelite', was of enormous technological importance, and effectively launched the modern plastics industry.
                ((/p1))
                ((p2))
                    The term 'plastic' comes from the Greek plassein, meaning 'to mould' Some plastics are derived from natural sources, some are semi-synthetic (the result of chemical action on a natural substance), and some are entirely synthetic, that is, chemically engineered from the constituents of coal or oil. Some are 'thermoplastic', which means that, like candle wax, they melt when heated and can then be reshaped. Others are 'thermosetting': like eggs, they cannot revert to their original viscous state, and their shape is thus fixed for ever Bakelite had the distinction of being the first totally synthetic thermosetting plastic.
                ((/p2))
                ((p3))
                    The history of today's plastics begins with the discovery of a series of semi-synthetic thermoplastic materials in the mid-nineteenth century. The impetus behind the development of these early plastics was generated by a number of factors - immense technological progress in the domain of chemistry, coupled with wider cultural changes, and the pragmatic need to find acceptable substitutes for dwindling supplies of 'luxury' materials such as tortoiseshell and ivory.
                ((/p3))
                ((p4))
                    Baekeland's interest in plastics began in 1885 when, as a young chemistry student in Belgium, he embarked on research into phenolic resins, the group of sticky substances produced when phenol (carbolic acid) combines with an aldehyde (a volatile fluid similar to alcohol). He soon abandoned the subject, however, only returning to it some years later. by 1905 he was a wealthy New Yorker, having recently made his fortune with the invention of a new photographic paper. While Baekeland had been busily amassing dollars, some advances had been made in the development of plastics. The years 1899 and 1900 had seen the patenting of the first semi-synthetic thermosetting material that could be manufactured on an industrial scale. In purely scientific terms, Baekeland's major contribution to the field is not so much the actual discovery of the material to which he gave his name, but rather the method by which a reaction between phenol and formaldehyde could be controlled, thus making possible its preparation on a commercial basis. On 13 July 1907, Baekeland took out his famous patent describing this preparation, the essential features of which are still in use today.
                ((/p4))
                ((p5))
                    The original patent outlined a three-stage process, in which phenol and formaldehyde (from wood or coal) were initially combined under vacuum inside a large egg-shaped kettle. The result was a resin known as Novalak, which became soluble and malleable when heated. The resin was allowed to cool in shallow trays until it hardened, and then broken up and ground into powder. Other substances were then introduced: including fillers, such as woodflour, asbestos or cotton, which increase strength and moisture resistance, catalysts (substances to speed up the reaction between two chemicals without joining to either) and hexa, a compound of ammonia and formaldehyde which supplied the additional formaldehyde necessary to form a thermosetting resin. This resin was then left to cool and harden, and ground up a second time. The resulting granular powder was raw Bakelite, ready to be made into a vast range of manufactured objects. In the last stage, the heated Bakelite was poured into a hollow mould of the required shape and subjected to extreme heat and pressure, thereby 'setting' its form for life.
                ((/p5))
                ((p6))
                    The design of Bakelite objects, everything from earrings to television sets, was governed to a large extent by the technical requirements of the moulding process. The object could not be designed so that it was locked into the mould and therefore difficult to extract. A common general rule was that objects should taper towards the deepest part of the mould, and if necessary the product was moulded in separate pieces. Moulds had to be carefully designed so that the molten Bakelite would flow evenly and completely into the mould. Sharp corners proved impractical and were thus avoided, giving rise to the smooth, 'streamlined' style popular in the 1930s. The thickness of the walls of the mould was also crucial’ thick walls took longer to cool and harden, a factor which had to be considered by the designer in order to make the most efficient use of machines.
                ((/p6))
                ((p7))
                    Baekeland's invention, although treated with disdain in its early years, went on to enjoy an unparalleled popularity which lasted throughout the first half of the twentieth century. It became the wonder product of the new world of industrial expansion - 'the material of a thousand uses'. Being both non-porous and heat-resistant, Bakelite kitchen goods were promoted as being germ-free and sterilisable. Electrical manufacturers seized on its insulating properties, and consumers everywhere relished its dazzling array of shades, delighted that they were now, at last, no longer restricted to the wood tones and drab browns of the pre-plastic era. It then fell from favour again during the 1950s, and was despised and destroyed in vast quantities. Recently, however, it has been experiencing something of a renaissance, with renewed demand for original Bakelite objects in the collectors' marketplace, and museums, societies and dedicated individuals once again appreciating the style and originality of this innovative material.
                ((/p7))
            </div>
        ";

        $text_4 = "
            <h6 class='mb-0'>
                <center><i>What's so funny?</i></center>
                <center><u><i>John McCrone reviews recent research on humour</i></u></center>
            </h6>

            <div class='reading-4 mt-3'>
                ((p1))
                    The joke comes over the headphones: ' Which side of a dog has the most hair? The left.' No, not funny. Try again. ' Which side of a dog has the most hair? The outside.' Hah! The punchline is silly yet fitting, tempting a smile, even a laugh. Laughter has always struck people as deeply mysterious, perhaps pointless. The writer Arthur Koestler dubbed it the luxury reflex: 'unique in that it serves no apparent biological purpose'.
                ((/p1))
                ((p2))
                    Theories about humour have an ancient pedigree. Plato expressed the idea that humour is simply a delighted feeling of superiority over others. Kant and Freud felt that joke-telling relies on building up a psychic tension which is safely punctured by the ludicrousness of the punchline. But most modern humour theorists have settled on some version of Aristotle's belief that jokes are based on a reaction to or resolution of incongruity, when the punchline is either a nonsense or, though appearing silly, has a clever second meaning.
                ((/p2))
                ((p3))
                    Graeme Ritchie, a computational linguist in Edinburgh, studies the linguistic structure of jokes in order to understand not only humour but language understanding and reasoning in machines. He says that while there is no single format for jokes, many revolve around a sudden and surprising conceptual shift. A comedian will present a situation followed by an unexpected interpretation that is also apt.
                ((/p3))
                ((p4))
                    So even if a punchline sounds silly, the listener can see there is a clever semantic fit and that sudden mental 'Aha!' is the buzz that makes us laugh. Viewed from this angle, humour is just a form of creative insight, a sudden leap to a new perspective.
                ((/p4))
                ((p5))
                    However, there is another type of laughter, the laughter of social appeasement and it is important to understand this too. Play is a crucial part of development in most young mammals. Rats produce ultrasonic squeaks to prevent their scuffles turning nasty. Chimpanzees have a 'play-face' - a gaping expression accompanied by a panting 'ah, ah' noise. In humans, these signals have mutated into smiles and laughs. Researchers believe social situations, rather than cognitive events such as jokes, trigger these instinctual markers of play or appeasement. People laugh on fairground rides or when tickled to flag a play situation, whether they feel amused or not.
                ((/p5))
                ((p6))
                    Both social and cognitive types of laughter tap into the same expressive machinery in our brains, the emotion and motor circuits that produce smiles and excited vocalisations. However, if cognitive laughter is the product of more general thought processes, it should result from more expansive brain activity.
                ((/p6))
                ((p7))
                    Psychologist Vinod Goel investigated humour using the new technique of 'single event' functional magnetic resonance imaging (fMRl). An MRI scanner uses magnetic fields and radio waves to track the changes in oxygenated blood that accompany mental activity. Until recently, MRI scanners needed several minutes of activity and so could not be used to track rapid thought processes such as comprehending a joke. New developments now allow half-second 'snapshots' of all sorts of reasoning and problem-solving activities.
                ((/p7))
                ((p8))
                    Although Goel felt being inside a brain scanner was hardly the ideal place for appreciating a joke, he found evidence that understanding a joke involves a widespread mental shift. His scans showed that at the beginning of a joke the listener'$ prefrontal cortex lit up, particularly the right prefrontal believed to be critical for problem solving. But there was also activity in the temporal lobes at the side of the head (consistent with attempts to rouse stored knowledge) and in many other brain areas. Then when the punchline arrived, a new area sprang to life -the orbital prefrontal cortex. This patch of brain tucked behind the orbits of the eyes is associated with evaluating information.
                ((/p8))
                ((p9))
                    Making a rapid emotional assessment of the events of the moment is an extremely demanding job for the brain, animal or human. Energy and arousal levels may need to be returned in the blink of an eye. These abrupt changes will produce either positive or negative feelings. The orbital cortex, the region that becomes active in Goel's experiment, seems the best candidate for the site that feeds such feelings into higher-level thought processes, with its close connections to the brain's sub-cortical arousal apparatus and centres of metabolic control.
                ((/p9))
                ((p10))
                    All warm-blooded animals make constant tiny adjustments in arousal in response to external events, but humans, who have developed a much more complicated internal life as a result of language, respond emotionally not only to their surroundings, but to their own thoughts. Whenever a sought-for answer snaps into place, there is a shudder of pleased recognition. Creative discovery being pleasurable, humans have learned to find ways of milking this natural response. The fact that jokes tap into our general evaluative machinery explains why the line between funny and disgusting, or funny and frightening, can be so fine. Whether a joke gives pleasure or pain depends on a person's outlook.
                ((/p10))
                ((p11))
                    Humour may be a luxury, but the mechanism behind it is no evolutionary accident. As Peter Derks, a psychologist at William and Mary College in Virginia, says: 'I like to think of humour as the distorted mirror of the mind. It's creative, perceptual, analytical and lingual. If we can figure out how the mind processes humour, then we'll have a pretty good handle on how it works in general.
                ((/p11))
            </div>
        ";

        $text_5 = "
            <h6 class='mb-0'>
                <center><i>What's so funny?</i></center>
                <center><u><i>John McCrone reviews recent research on humour</i></u></center>
            </h6>

            <div class='reading-5 mt-3'>
                ((p1))
                    The joke comes over the headphones: ' Which side of a dog has the most hair? The left.' No, not funny. Try again. ' Which side of a dog has the most hair? The outside.' Hah! The punchline is silly yet fitting, tempting a smile, even a laugh. Laughter has always struck people as deeply mysterious, perhaps pointless. The writer Arthur Koestler dubbed it the luxury reflex: 'unique in that it serves no apparent biological purpose'.
                ((/p1))
                ((p2))
                    Theories about humour have an ancient pedigree. Plato expressed the idea that humour is simply a delighted feeling of superiority over others. Kant and Freud felt that joke-telling relies on building up a psychic tension which is safely punctured by the ludicrousness of the punchline. But most modern humour theorists have settled on some version of Aristotle's belief that jokes are based on a reaction to or resolution of incongruity, when the punchline is either a nonsense or, though appearing silly, has a clever second meaning.
                ((/p2))
                ((p3))
                    Graeme Ritchie, a computational linguist in Edinburgh, studies the linguistic structure of jokes in order to understand not only humour but language understanding and reasoning in machines. He says that while there is no single format for jokes, many revolve around a sudden and surprising conceptual shift. A comedian will present a situation followed by an unexpected interpretation that is also apt.
                ((/p3))
                ((p4))
                    So even if a punchline sounds silly, the listener can see there is a clever semantic fit and that sudden mental 'Aha!' is the buzz that makes us laugh. Viewed from this angle, humour is just a form of creative insight, a sudden leap to a new perspective.
                ((/p4))
                ((p5))
                    However, there is another type of laughter, the laughter of social appeasement and it is important to understand this too. Play is a crucial part of development in most young mammals. Rats produce ultrasonic squeaks to prevent their scuffles turning nasty. Chimpanzees have a 'play-face' - a gaping expression accompanied by a panting 'ah, ah' noise. In humans, these signals have mutated into smiles and laughs. Researchers believe social situations, rather than cognitive events such as jokes, trigger these instinctual markers of play or appeasement. People laugh on fairground rides or when tickled to flag a play situation, whether they feel amused or not.
                ((/p5))
                ((p6))
                    Both social and cognitive types of laughter tap into the same expressive machinery in our brains, the emotion and motor circuits that produce smiles and excited vocalisations. However, if cognitive laughter is the product of more general thought processes, it should result from more expansive brain activity.
                ((/p6))
                ((p7))
                    Psychologist Vinod Goel investigated humour using the new technique of 'single event' functional magnetic resonance imaging (fMRl). An MRI scanner uses magnetic fields and radio waves to track the changes in oxygenated blood that accompany mental activity. Until recently, MRI scanners needed several minutes of activity and so could not be used to track rapid thought processes such as comprehending a joke. New developments now allow half-second 'snapshots' of all sorts of reasoning and problem-solving activities.
                ((/p7))
                ((p8))
                    Although Goel felt being inside a brain scanner was hardly the ideal place for appreciating a joke, he found evidence that understanding a joke involves a widespread mental shift. His scans showed that at the beginning of a joke the listener'$ prefrontal cortex lit up, particularly the right prefrontal believed to be critical for problem solving. But there was also activity in the temporal lobes at the side of the head (consistent with attempts to rouse stored knowledge) and in many other brain areas. Then when the punchline arrived, a new area sprang to life -the orbital prefrontal cortex. This patch of brain tucked behind the orbits of the eyes is associated with evaluating information.
                ((/p8))
                ((p9))
                    Making a rapid emotional assessment of the events of the moment is an extremely demanding job for the brain, animal or human. Energy and arousal levels may need to be returned in the blink of an eye. These abrupt changes will produce either positive or negative feelings. The orbital cortex, the region that becomes active in Goel's experiment, seems the best candidate for the site that feeds such feelings into higher-level thought processes, with its close connections to the brain's sub-cortical arousal apparatus and centres of metabolic control.
                ((/p9))
                ((p10))
                    All warm-blooded animals make constant tiny adjustments in arousal in response to external events, but humans, who have developed a much more complicated internal life as a result of language, respond emotionally not only to their surroundings, but to their own thoughts. Whenever a sought-for answer snaps into place, there is a shudder of pleased recognition. Creative discovery being pleasurable, humans have learned to find ways of milking this natural response. The fact that jokes tap into our general evaluative machinery explains why the line between funny and disgusting, or funny and frightening, can be so fine. Whether a joke gives pleasure or pain depends on a person's outlook.
                ((/p10))
                ((p11))
                    Humour may be a luxury, but the mechanism behind it is no evolutionary accident. As Peter Derks, a psychologist at William and Mary College in Virginia, says: 'I like to think of humour as the distorted mirror of the mind. It's creative, perceptual, analytical and lingual. If we can figure out how the mind processes humour, then we'll have a pretty good handle on how it works in general.
                ((/p11))
            </div>
        ";

        $text_6 = "
            <h6 class='mb-0'>
                <center><u>The Birth of Scientific English</u></center>
            </h6>

            <div class='reading-6 mt-3'>
                ((p1))
                   World science is dominated today by a small number of languages, including Japanese, German and French, but it is English which is probably the most popular global language of science. This is not just because of the importance of English- speaking countries such as the USA in scientific research; the scientists of many non-English-speaking countries find that they need to write their research papers in English to reach a wide international audience. Given the prominence of scientific English today, it may seem surprising that no one really knew how to write science in English before the 17th century. Before that, Latin was regarded as the lingua franca((sup2))1((/sup2)) for European intellectuals.
                ((/p1))
                ((p2))
                   The European Renaissance (c. 14th-16th century) is sometimes called the 'revival of learning', a time of renewed interest in the 'lost knowledge' of classical times. At the same time, however, scholars also began to test and extend this knowledge. The emergent nation states of Europe developed competitive interests in world exploration and the development of trade. Such expansion, which was to take the English language west to America and east to India, was supported by scientific developments such as the discovery of magnetism (and hence the invention of the compass), improvements in cartography and - perhaps the most important scientific revolution of them all - the new theories of astronomy and the movement of the Earth in relation to the planets and stars, developed by Copernicus (1473-1543).
                ((/p2))
                ((p3))
                   England was one of the first countries where scientists adopted and publicised Copernican ideas with enthusiasm. Some of these scholars, including two with interests in language - John Wallis and John Wilkins - helped found the Royal Society in 1660 in order to promote empirical scientific research.
                ((/p3))
                ((p4))
                   Across Europe similar academies and societies arose, creating new national traditions of science. In the initial stages of the scientific revolution, most publications in the national languages were popular works, encyclopaedias, educational textbooks and translations. Original science was not done in English until the second half of the 17th century. For example, Newton published his mathematical treatise, known as the Principia, in Latin, but published his later work on the properties of light - Opticks - in English.
                ((/p4))
                ((p5))
                   There were several reasons why original science continued to be written in Latin.
                ((/p5))
                ((p6))
                   The first was simply a matter of audience. Latin was suitable for an international audience of scholars, whereas English reached a socially wider, but more local audience. Hence, popular science was written in English.
                ((/p6))
                ((p7))
                   A second reason for writing in Latin' may, perversely, have been a concern for secrecy. Open publication had dangers in putting into the public domain preliminary ideas which had not yet been fully exploited by their 'author'. This growing concern about intellectual property rights was a feature of the period - it reflected both the humanist notion of the individual, rational scientist who invents and discovers through private intellectual labour, and the growing connection between original science and commercial exploitation. There was something of a social distinction between 'scholars and gentlemen' who understood Latin, and men of trade who lacked a classical education. And in the mid-17fh century it was common practice for mathematicians to keep their discoveries and proofs secret, by writing them in cipher, in obscure languages, or in private messages deposited in a sealed box with the Royal Society. Some scientists might have felt more comfortable with Latin precisely because its audience, though international, was socially restricted.
                ((/p7))
                ((p8))
                   Doctors clung the most keenly to Latin as an 'insider language'.
                ((/p8))
                ((p9))
                   A third reason why the writing of original science in English was delayed may have been to do with the linguistic inadequacy of English in the early modern period.
                ((/p9))
                ((p10))
                   English was not well equipped to deal with scientific argument. First, it lacked the necessary technical vocabulary. Second, it lacked the grammatical resources required to represent the world in an objective and impersonal way, and to discuss the relations, such as cause and effect, that might hold between complex and hypothetical entities.
                ((/p10))
                ((p11))
                   Fortunately, several members of the Royal Society possessed an interest in language and became engaged in various linguistic projects. Although a proposal in 1664 to establish a committee for improving the English language came to little, the society's members did a great deal to foster the publication of science in English and to encourage the development of a suitable writing style. Many members of the Royal Society also published monographs in English. One of the first was by Robert Hooke, the society's first curator of experiments, who described his experiments with microscopes in Micrographia (1665). This work is largely narrative in style, based on a transcript of oral demonstrations and lectures.
                ((/p11))
                ((p12))
                   In 1665 a new scientific journal. Philosophical Transactions, was inaugurated. Perhaps the first international English-language scientific journal, it encouraged a new genre of scientific writing, that of short, focused accounts of particular experiments.
                ((/p12))
                ((p13))
                   The 17th century was thus a formative period in the establishment of scientific English. In the following century much of this momentum was lost as German established itself as the leading European language of science. It is estimated that by the end of the 1 8th century 401 German scientific journals had been established as opposed to 96 in France and 50 in England. However, in the 19th century scientific English again enjoyed substantial lexical growth as the industrial revolution created the need for new technical vocabulary, and new, specialised, professional societies were instituted to promote and publish in the new disciplines.
                ((/p13))
                ((p14))
                   ((i1))((sup1))1((/sup1))lingua franca: a language which is used for communication between groups of people who speak different languages((/i1))
                ((/p14))
            </div>
        ";

        $text_7 = "
            <h6 class='mb-0'>
                <center><u>The Birth of Scientific English</u></center>
            </h6>

            <div class='reading-7 mt-3'>
                ((p1))
                   World science is dominated today by a small number of languages, including Japanese, German and French, but it is English which is probably the most popular global language of science. This is not just because of the importance of English- speaking countries such as the USA in scientific research; the scientists of many non-English-speaking countries find that they need to write their research papers in English to reach a wide international audience. Given the prominence of scientific English today, it may seem surprising that no one really knew how to write science in English before the 17th century. Before that, Latin was regarded as the lingua franca((sup2))1((/sup2)) for European intellectuals.
                ((/p1))
                ((p2))
                   The European Renaissance (c. 14th-16th century) is sometimes called the 'revival of learning', a time of renewed interest in the 'lost knowledge' of classical times. At the same time, however, scholars also began to test and extend this knowledge. The emergent nation states of Europe developed competitive interests in world exploration and the development of trade. Such expansion, which was to take the English language west to America and east to India, was supported by scientific developments such as the discovery of magnetism (and hence the invention of the compass), improvements in cartography and - perhaps the most important scientific revolution of them all - the new theories of astronomy and the movement of the Earth in relation to the planets and stars, developed by Copernicus (1473-1543).
                ((/p2))
                ((p3))
                   England was one of the first countries where scientists adopted and publicised Copernican ideas with enthusiasm. Some of these scholars, including two with interests in language - John Wallis and John Wilkins - helped found the Royal Society in 1660 in order to promote empirical scientific research.
                ((/p3))
                ((p4))
                   Across Europe similar academies and societies arose, creating new national traditions of science. In the initial stages of the scientific revolution, most publications in the national languages were popular works, encyclopaedias, educational textbooks and translations. Original science was not done in English until the second half of the 17th century. For example, Newton published his mathematical treatise, known as the Principia, in Latin, but published his later work on the properties of light - Opticks - in English.
                ((/p4))
                ((p5))
                   There were several reasons why original science continued to be written in Latin.
                ((/p5))
                ((p6))
                   The first was simply a matter of audience. Latin was suitable for an international audience of scholars, whereas English reached a socially wider, but more local audience. Hence, popular science was written in English.
                ((/p6))
                ((p7))
                   A second reason for writing in Latin' may, perversely, have been a concern for secrecy. Open publication had dangers in putting into the public domain preliminary ideas which had not yet been fully exploited by their 'author'. This growing concern about intellectual property rights was a feature of the period - it reflected both the humanist notion of the individual, rational scientist who invents and discovers through private intellectual labour, and the growing connection between original science and commercial exploitation. There was something of a social distinction between 'scholars and gentlemen' who understood Latin, and men of trade who lacked a classical education. And in the mid-17fh century it was common practice for mathematicians to keep their discoveries and proofs secret, by writing them in cipher, in obscure languages, or in private messages deposited in a sealed box with the Royal Society. Some scientists might have felt more comfortable with Latin precisely because its audience, though international, was socially restricted.
                ((/p7))
                ((p8))
                   Doctors clung the most keenly to Latin as an 'insider language'.
                ((/p8))
                ((p9))
                   A third reason why the writing of original science in English was delayed may have been to do with the linguistic inadequacy of English in the early modern period.
                ((/p9))
                ((p10))
                   English was not well equipped to deal with scientific argument. First, it lacked the necessary technical vocabulary. Second, it lacked the grammatical resources required to represent the world in an objective and impersonal way, and to discuss the relations, such as cause and effect, that might hold between complex and hypothetical entities.
                ((/p10))
                ((p11))
                   Fortunately, several members of the Royal Society possessed an interest in language and became engaged in various linguistic projects. Although a proposal in 1664 to establish a committee for improving the English language came to little, the society's members did a great deal to foster the publication of science in English and to encourage the development of a suitable writing style. Many members of the Royal Society also published monographs in English. One of the first was by Robert Hooke, the society's first curator of experiments, who described his experiments with microscopes in Micrographia (1665). This work is largely narrative in style, based on a transcript of oral demonstrations and lectures.
                ((/p11))
                ((p12))
                   In 1665 a new scientific journal. Philosophical Transactions, was inaugurated. Perhaps the first international English-language scientific journal, it encouraged a new genre of scientific writing, that of short, focused accounts of particular experiments.
                ((/p12))
                ((p13))
                   The 17th century was thus a formative period in the establishment of scientific English. In the following century much of this momentum was lost as German established itself as the leading European language of science. It is estimated that by the end of the 1 8th century 401 German scientific journals had been established as opposed to 96 in France and 50 in England. However, in the 19th century scientific English again enjoyed substantial lexical growth as the industrial revolution created the need for new technical vocabulary, and new, specialised, professional societies were instituted to promote and publish in the new disciplines.
                ((/p13))
                ((p14))
                   ((i1))((sup1))1((/sup1))lingua franca: a language which is used for communication between groups of people who speak different languages((/i1))
                ((/p14))
            </div>
        ";
    ?>
    
    <?php $i = 0;?>
    <!-- 1 - 3 -->
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                        <p class="question">
                            READING PASSAGE 1
                        </p>
                        <p>
                            <i>You should spend about 20 minutes on Questions 1–13 which are based on Reading Passage 1 below.</i>
                        </p>
                            <?= $text_1?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p>
                                <i>
                                    <b>Questions 1-3</b><br>
                                    <i>
                                        Complete the summary.<br>
                                        Choose ONE WORD ONLY from the passage for each answer.<br>
                                        Write your answers in boxes 1-3 on your answer sheet.
                                    </i>
                                </i>
                            </p>

                            <center>
                                <table class="tableSoal w-100 mb-3">
                                    <tr>
                                        <td>
                                            <p>&emsp;Some plastics behave in a similar way to <b>1)</b> <?= soal_isian_ielts("jawaban_reading[$i]"); $i++?> In that they melt under heat and can be moulded into new forms. Bakelite was uxnique because it was the first material to be both entirely <b>2)</b> <?= soal_isian_ielts("jawaban_reading[$i]"); $i++?> in origin, and thermosetting.</p>
                                            <p>&emsp;There were several reasons for the research into plastics in the nineteenth century, among them the great advances that had been made in the field of <b>3)</b> <?= soal_isian_ielts("jawaban_reading[$i]"); $i++?> and the search for alternatives to natural resources like ivory.</p>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 3;?>
    <!-- 4 - 8 -->
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text_2?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p>
                                <i>
                                    <b>Questions 4-8</b><br>
                                    <i>
                                        Complete the flow-chart.<br>
                                        Choose <b>ONE WORD ONLY</b> from the passage for each answer.<br>
                                        Write your answers in boxes 4-8 on your answer sheet.
                                    </i>
                                </i>
                            </p>

                            <center>
                                <h6>
                                    The Production of Bakelite
                                </h6>
                            </center>
                            <img src="<?= base_url()?>public/assets/img-soal/transforme/ac-03/4-8.png" alt="" class="img-fluid">

                            <p><b>4.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>5.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>6.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>7.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>8.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 8;?>
    <!-- 9 - 13 -->
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text_3?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p>
                                <i>
                                    <b>Questions 9 and 10</b><br>
                                    <i>
                                        Choose <b>TWO</b> letters <b>A-E</b>.<br>
                                        Write your answers in boxes 9-10 on your answer sheet.<br>
                                        <b>NB</b> Your answers may be given in either order.
                                    </i>
                                </i>
                            </p>

                            <p>
                                Which <b>TWO</b> of the following factors influencing the design of Bakelite objects are mentioned in the text?
                            </p>

                            <p class="ps-4"><b>A.</b> the function which the object would serve</p>
                            <p class="ps-4"><b>B.</b> the ease with which the resin could fill the mould</p>
                            <p class="ps-4"><b>C.</b> the facility with which the object could be removed from the mould</p>
                            <p class="ps-4"><b>D.</b> the limitations of the materials used to manufacture the mould</p>
                            <p class="ps-4"><b>E.</b> the fashionable styles of the period</p>

                            <p><b>9.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>10.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>

                            <div class="mb-5"></div>

                            <p>
                                <i>
                                    <b>Questions 11-13</b><br>
                                    <i>
                                        Do the following statements agree with the information given in Reading Passage 1?<br>
                                        In boxes 11-13 on your answer sheet write
                                    </i>
                                </i>
                            </p>
                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b>TRUE</b>     if the statement agrees with the information<br>
                                        <b>FALSE</b>   	if the statement contradicts the information<br>
                                        <b>NOT GIVEN</b>   if there is no information on this<br>
                                    </td>
                                </tr>
                            </table>

                            <?php
                                $data_soal_11_13 = [
                                    [
                                        "no" => 11,
                                        "soal" => "Modern-day plastic preparation is based on the same principles as that patented in 1907.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[10]"
                                    ],
                                    [
                                        "no" => 12,
                                        "soal" => "Bakelite was immediately welcomed as a practical and versatile material.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[11]"
                                    ],
                                    [
                                        "no" => 13,
                                        "soal" => "Bakelite was only available in a limited range of colours.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[12]"
                                    ],
                                ];
                            ?>

                            <?php foreach ($data_soal_11_13 as $data_soal) :?>
                                <?= soal_pg_ielts($data_soal);?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 13;?>
    <!-- 14 - 20 -->
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p class="question">
                                READING PASSAGE 2
                            </p>
                            <p>
                                <i>
                                    You should spend about 20 minutes on <b>Questions 14–27</b> which are based on Reading Passage 2 below.
                                </i>
                            </p>
                            <?= $text_4?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p>
                                <i>
                                    <b>Questions 14-20</b><br>
                                    <i>
                                        Do the following statements agree with the information given in Reading Passage 2?<br>
                                        In boxes 14-20 on your answer sheet write
                                    </i>
                                </i>
                            </p>
                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b>TRUE</b>     if the statement agrees with the information <br>
                                        <b>FALSE</b>   	if the statement contradicts the information <br>
                                        <b>NOT GIVEN</b>   if there is no information on this
                                    </td>
                                </tr>
                            </table>

                            <?php
                                $data_soal_14_20 = [
                                    [
                                        "no" => 14,
                                        "soal" => "Arthur Koestler considered laughter biologically important in several ways.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[13]"
                                    ],
                                    [
                                        "no" => 15,
                                        "soal" => "Plato believed humour to be a sign of above-average intelligence.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[14]"
                                    ],
                                    [
                                        "no" => 16,
                                        "soal" => "Kant believed that a successful joke involves the controlled release of nervous energy.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[15]"
                                    ],
                                    [
                                        "no" => 17,
                                        "soal" => "Current thinking on humour has largely ignored Aristotle's view on the subject.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[16]"
                                    ],
                                    [
                                        "no" => 18,
                                        "soal" => "Graeme Ritchie's work links jokes to artificial intelligence.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[17]"
                                    ],
                                    [
                                        "no" => 19,
                                        "soal" => "Most comedians use personal situations as a source of humour.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[18]"
                                    ],
                                    [
                                        "no" => 20,
                                        "soal" => "Chimpanzees make particular noises when they are playing.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[19]"
                                    ],
                                ];
                            ?>

                            <?php foreach ($data_soal_14_20 as $data_soal) :?>
                                <?= soal_pg_ielts($data_soal);?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 20?>
    <!-- 21 - 27 -->
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text_5?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p>
                                <i>
                                    <b>Questions 21-23</b><br>
                                    The diagram below shows the areas of the brain activated by jokes.<br>
                                    Label the diagram.<br>
                                    Choose <b>NO MORE THAN TWO WORDS</b> from the passage for each answer.<br>
                                    Write your answers in boxes 21-23 on your answer sheet.
                                </i>
                            </p>

                            <img src="<?= base_url()?>public/assets/img-soal/transforme/ac-03/21-23.png" alt="" class="img-fluid">

                            <p><b>21.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>22.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>23.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>

                            <div class="mb-5"></div>

                            <p>
                                <i>
                                    <b>Questions 24-27</b><br>
                                    <i>
                                        Complete each sentence with the correct ending <b>A-G</b> below.
                                        Write the correct letter <b>A-G</b> in boxes <b>24-27</b> on your answer sheet.
                                    </i>
                                </i>
                            </p>

                            <center>
                                <table class="tableSoal w-100 mb-3">
                                    <tr>
                                        <td>
                                            <p><b>A.</b> react to their own thoughts.</p>
                                            <p><b>B.</b> helped create language in humans.</p>
                                            <p><b>C.</b> respond instantly to whatever is happening.</p>
                                            <p><b>D.</b> may provide valuable information about the operation of the brain.</p>
                                            <p><b>E.</b> cope with difficult situations.</p>
                                            <p><b>F.</b> relate to a person's subjective views.</p>
                                            <p><b>G.</b> led our ancestors to smile and then laugh.</p>
                                        </td>
                                    </tr>
                                </table>
                            </center>

                            <p><b>24.</b> One of the brain's most difficult tasks is to  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>25.</b> Because of the language they have developed, humans  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>26.</b> Individual responses to humour  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>27.</b> Peter Derks believes that humour <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 27?>
    <!-- 28 - 34 -->
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p class="question">
                                READING PASSAGE 3
                            </p>
                            <p>
                                <i>
                                    You should spend about 20 minutes on Questions 27–40 which are based on Reading Passage 3 below
                                </i>
                            </p>
                            <?= $text_6?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p>
                                <i>
                                    <b>Questions 28-34</b><br>
                                    Complete the summary.<br>
                                    Choose <b>NO MORE THAN TWO WORDS</b> from the passage for each answer.<br>
                                    Write your answers in boxes 28-34 on your answer sheet.
                                </i>
                            </p>

                            <div class="ps-4">
                                <p>
                                    In Europe, modern science emerged at the same time as the nation state. At first, the scientific language of choice remained <b>28</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> It allowed scientists to communicate with other socially privileged thinkers while protecting their work from unwanted exploitation. Sometimes the desire to protect ideas seems to have been stronger than the desire to communicate them, particularly in the case of mathematicians and <b>29</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> In Britain, moreover, scientists worried that English had neither the <b>30</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> nor the <b>31</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> to express their ideas. This situation only changed after 1660 when scientists associated with the <b>32</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> set about developing English. An early scientific journal fostered a new kind of writing based on short descriptions of specific experiments. Although English was then overtaken by <b>33</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> it developed again in the 19th century as a direct result of the <b>34</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 34?>
    <!-- 35 - 40 -->
    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text_7?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p>
                                <i>
                                    <b>Questions 35-37</b><br>
                                    <i>
                                        Do the following statements agree with the information given in Reading Passage 3?<br>
                                        In boxes 35-37 on your answer sheet write
                                    </i>
                                </i>
                            </p>
                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b>TRUE</b>     if the statement agrees with the information <br>
                                        <b>FALSE</b>   	if the statement contradicts the information <br>
                                        <b>NOT GIVEN</b>   if there is no information on this
                                    </td>
                                </tr>
                            </table>

                            <?php
                                $data_soal_35_37 = [
                                    [
                                        "no" => 35,
                                        "soal" => "There was strong competition between scientists in Renaissance Europe.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[34]"
                                    ],
                                    [
                                        "no" => 36,
                                        "soal" => "The most important scientific development of the Renaissance period was the  discovery of magnetism.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[35]"
                                    ],
                                    [
                                        "no" => 37,
                                        "soal" => "In 17th-century Britain, leading thinkers combined their interest in science with an 	interest in how to express ideas.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[36]"
                                    ],
                                ];
                            ?>

                            <?php foreach ($data_soal_35_37 as $data_soal) :?>
                                <?= soal_pg_ielts($data_soal);?>
                            <?php endforeach;?>

                            <div class="mb-5"></div>
                            
                            <?php $i = 37?>

                            <p>
                                <i>
                                    <b>Questions 38-40</b><br>
                                    <i>
                                        Complete the table.<br>
                                        Choose <b>NO MORE THAN TWO WORDS</b> from the passage for each answer.<br>
                                        Write your answers in boxes <b>38-40</b> on your answer sheet.
                                    </i>
                                </i>
                            </p>
                            <center>
                                <table class="tableSoal w-100 mb-3">
                                    <tr>
                                        <td colspan="3"><h4><center>Science written in the first half of the 17th century</center></h4></td>
                                    </tr>
                                    <tr>
                                        <td><b>Language used</b></td>
                                        <td>
                                            Latin
                                        </td>
                                        <td>
                                            English
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Type of science</b></td>
                                        <td>
                                            Original
                                        </td>
                                        <td>
                                            <b>38)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Examples</b></td>
                                        <td>
                                            <b>39)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>
                                        </td>
                                        <td>
                                            Encyclopaedias
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Target audience</b></td>
                                        <td>
                                            International scholars
                                        </td>
                                        <td>
                                            <b>40)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> but socially wider
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?= $this->endSection()?>

<?= $this->section('sesi-writing') ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p class="question mb-3">
                        WRITING TASK 1<br>
                    </p>
                    <p>
                        You should spend about 20 minutes on this task 
                    </p>
        
                    <p class="ps-3"><b><i>The charts below show the main reasons for study among students of different age groups and the amount of support they received from employers.</i></b></p>
                    <p class="ps-3"><b><i>Summarise the information by selecting and reporting the main features, and make comparisons where relevant.</i></b></p>
                    <p>Write at least 150 words.</p>
        
                    <img src="<?= base_url()?>public/assets/img-soal/transforme/ac-03/w-1.png" alt="" class="img-fluid">
                </div>
                <div class="col-6">
                    <span>Type your answer here</span>
                    <textarea id="textarea-1" class="form-control mb-3" name="text_writing[0]" data-bs-toggle="autosize" placeholder="" style="height: 300px;"></textarea>
                    <center>Total word Count : <span id="count-textarea-1">0</span></center>
                </div>
            </div>

        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p class="question mb-3">
                        WRITING TASK 2<br>
                    </p>
                    <p>
                        You should spend about 40 minutes on this task<br>
                        Write about the following topic:
                    </p>
        
                    <p class="ps-3"><b><i>In some countries, young people are encouraged to work or travel for a year between finishing high school and starting university studies.</i></b></p>
                    <p class="ps-3"><b><i>Discuss the advantages and disadvantages for young people who decide to do this.</i></b></p>
                    
                    <p>Give reasons for your answer and include any relevant examples from your own knowledge or experience. </p>
                    <p>Write at least 250 words.</p>
                </div>
                <div class="col-6">
                    <span>Type your answer here</span>
                    <textarea id="textarea-2" class="form-control mb-3" name="text_writing[1]" data-bs-toggle="autosize" placeholder="" style="height: 300px;"></textarea>
                    <center>Total word Count : <span id="count-textarea-2">0</span></span></center>
                </div>
            </div>

        </div>
    </div>
<?= $this->endSection()?>