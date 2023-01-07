<style>
    .social li {
        display: inline-block;
        margin-right: 10px;
    }

    table{
        width:100%;
    }

    td, th {
        padding: 10px;
    }

    th {
        text-align: center;
        background: #30466f;
        color: #fff;
        font-size: 16px;
        font-weight: 400;
        border: 1px solid #475f8b;
        text-transform: capitalize;
    }

    tr:nth-of-type(odd) {
        background: #e6efff;
    }

    table tr {
        border: 1px solid #475f8b;
        padding: 5px;
    }
</style>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="bread-inner">
                    <div class="col-xs-12">
                        <h2>सूचना पट्ट</h2>
                        <ul class="bread-list">
                            <li><a href="/">घर<i class="fas fa-chevron-right"></i></a></li>
                            <li class="active"><a href="notice.html">सूचना पट्ट</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <!-- About Us -->
    <section class="about section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="about-content">
                        <h3>भर्ती</h3>
                        <table id="recruitment" cellspacing="0" border="1" style="text-align: center;">
							<thead>
                                <colgroup width="100"></colgroup>
								<colgroup width="670"></colgroup>
								<colgroup width="350"></colgroup>
								<tr>
                                    <th>#</th>
									<th>विषय</th>
									<th>सामग्री (संसाधन)</th>
								</tr>
							</thead>
							<tbody>
                                <?php foreach ($downloads_arr as $key => $value):
                                        $subject = 'sub_' . Main::$_lang;
                                ?>
                                <tr>
                                    <td><strong><?php echo $key + 1 ?></strong></td>
                                    <td class="blink <?php if($value->blink) echo 'blink-new' ?>"><?php echo $value->$subject ?></td>
                                    <td class="text-left">
                                        <?php foreach($value->links as $row):
                                            $content = 'content_' . Main::$_lang;
                                            $href = 'href_' . Main::$_lang;
                                        ?>
                                            <p ><a class="pl-4" href="<?php echo $row->$href ?>" target="__blank"><i class="fa fa-download"></i> <?php echo $row->$content ?></a></p>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<section class="about section c-butions">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <!-- <div class="about-content" style="overflow-y: scroll;"> -->
                    <div class="about-content">
                        <h3>प्रशिक्षण कार्यक्रम</h3>
                        <!-- <table id="schedule" cellspacing="0" border="1" style="text-align: center;">
							<thead>
								<colgroup width="100"></colgroup>
								<colgroup width="621"></colgroup>
								<colgroup span="4" width="150"></colgroup>
								<colgroup width="225"></colgroup>
								<colgroup width="107"></colgroup>
								<colgroup width="218"></colgroup>
								<tr>
									<th>SL. No.</th>
									<th>Subject / Name of the Course</th>
									<th>Core/Non Core</th>
									<th>Duration (Days)</th>
									<th>From</th>
									<th>To</th>
									<th>Level of Participant</th>
									<th>Mode of Training</th>
									<th>WhatsApp No. of Course Director</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table> -->
                        <p><b>Under Updation</b></p>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>

	<section class="about section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="about-content">
                        <h3>शुद्धिपत्र</h3>
                        <p><b>अद्यतन के तहत</b></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
