<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1800" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人氣象站</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <header class="container-fluid mt-3">
        <div id="cardHead" class="card bg-dark text-white">
            <img id="TW_CityImg" src="image/city/Taipei.jpg" class="card-img img-fluid" alt="IMAGE">
            <div class="card-img-overlay">
                <h3 class="card-title"><span id="cityName">臺北市</span> 天氣預報</h3>
            </div>
        </div>
    </header>
    <section id="areaSelector" class="container-fluid mt-3">
        <div class="form-row">
            <div class="col-3">
                <select class="form-control" id="city">
                </select>
            </div>
        </div>
    </section>
    <section id="todayWeather" class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
              當前天氣狀況
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2 my-auto"><img id="today_Img" src="image/weather/1.png" alt="weather" class="in-card-img img-fluid ml-auto"></div>        
                    <div class="col-3 p-3 my-auto">
                        <h2><span id="today_minT"></span>-<span id="today_maxT"></span> °C</h2>
                        天氣狀況： <span id="today_weatherCond"></span><br>
                        舒適度： <span id="today_comfortIdx"></span><br>
                        降雨機率： <span id="today_rainProb"></span> %<br>
                        最大風速： <span id="today_wind"></span> 公尺／秒
                    </div>
                    <div class="col-2 offset-1 mt-1 my-auto"><img src="image/util/drop.png" alt="drop" class="in-card-img img-fluid ml-auto"></div>
                    <div class="col-4 p-2 my-auto">
                        <h5>過去1小時降雨量</h5>
                        <p id="rain_1hr">0.5 mm</p>
                        <h5>過去24小時降雨量</h5>
                        <p id="rain_24hr">24 mm</p>
                        <button id="rainBtn" type="button" class="btn btn-info">查看各觀測站降雨資料</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="futureWeather" class="container-fluid mt-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a id="twoday_tab" class="nav-link active"  data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">未來兩天</a>
            </li>
            <li class="nav-item" role="presentation">
              <a id="week_tab" class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">未來一週</a>
            </li>
          </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card mt-2">
                    <div class="card-header">
                      明天天氣
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 my-auto"><img src="image/weather/1.png" alt="weather" class="twoday-img in-card-img img-fluid ml-auto"></div>        
                            <div class="col-3 p-3 my-auto twoday-info">
                                <h3>白天</h3>
                                <h3><span class="minT"></span>-<span class="maxT"></span> °C</h3>
                                天氣狀況： <span class="weatherCond"></span><br>
                                舒適度： <span class="comfortIdx"></span><br>
                                降雨機率： <span class="rainProb"></span> %<br>
                                最大風速： <span class="wind"></span> 公尺／秒
                            </div>
                            <div class="col-2 offset-1 my-auto"><img src="image/weather/1.png" alt="weather" class="twoday-img in-card-img img-fluid ml-auto"></div>        
                            <div class="col-3 p-3 my-auto twoday-info">
                                <h3>晚上</h3>
                                <h3><span class="minT"></span>-<span class="maxT"></span> °C</h3>
                                天氣狀況： <span class="weatherCond"></span><br>
                                舒適度： <span class="comfortIdx"></span><br>
                                降雨機率： <span class="rainProb"></span> %<br>
                                最大風速： <span class="wind"></span> 公尺／秒
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-header">
                      後天天氣
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 my-auto"><img src="image/weather/1.png" alt="weather" class="twoday-img in-card-img img-fluid ml-auto"></div>        
                            <div class="col-3 p-3 my-auto twoday-info">
                                <h3>白天</h3>
                                <h3><span class="minT"></span>-<span class="maxT"></span> °C</h3>
                                天氣狀況： <span class="weatherCond"></span><br>
                                舒適度： <span class="comfortIdx"></span><br>
                                降雨機率： <span class="rainProb"></span> %<br>
                                最大風速： <span class="wind"></span> 公尺／秒
                            </div>
                            <div class="col-2 offset-1 my-auto"><img src="image/weather/1.png" alt="weather" class="twoday-img in-card-img img-fluid ml-auto"></div>        
                            <div class="col-3 p-3 my-auto twoday-info">
                                <h3>晚上</h3>
                                <h3><span class="minT"></span>-<span class="maxT"></span> °C</h3>
                                天氣狀況： <span class="weatherCond"></span><br>
                                舒適度： <span class="comfortIdx"></span><br>
                                降雨機率： <span class="rainProb"></span> %<br>
                                最大風速： <span class="wind"></span> 公尺／秒
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="p-3 mb-2 container-fluid bg-white rounded">
                    <div class="row">
                        <div class="col-2 my-1"><img src="image/weather/1.png" alt="weather" class="week-img in-card-img img-fluid ml-auto"></div>
                        <div class="col-3 p-3 my-auto week-info">
                            <h4>白天</h4>
                            <h4><span class="minT"></span>-<span class="maxT"></span> °C</h4>
                            天氣狀況： <span class="weatherCond"></span><br>
                            舒適度： <span class="comfortIdx"></span><br>
                            降雨機率： <span class="rainProb"></span> %<br>
                            最大風速： <span class="wind"></span> 公尺／秒
                        </div>
                        <div class="col-2 offset-1 my-1"><img src="image/weather/1.png" alt="weather" class="week-img in-card-img img-fluid ml-auto"></div>        
                        <div class="col-3 p-3 my-auto week-info">
                            <h4>晚上</h4>
                            <h4><span class="minT"></span>-<span class="maxT"></span> °C</h4>
                            天氣狀況： <span class="weatherCond"></span><br>
                            舒適度： <span class="comfortIdx"></span><br>
                            降雨機率： <span class="rainProb"></span> %<br>
                            最大風速： <span class="wind"></span> 公尺／秒
                        </div>
                    </div>
                    <div class="my-3 row">
                        <div id="weatherBoxset" class="offset-3 col-8 d-flex">
                            <div class="little-box bg-light p-2 border rounded">
                                <h5 class="text-center">8/24</h5>
                                <div></div>
                                <p class="text-center"><span>32</span>°&nbsp;&nbsp;<span class="text-secondary">32</span>°<p>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </section>
    
    <!-- Modal -->
    <div class="modal fade" id="rainModal" tabindex="-1" aria-labelledby="rainModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="rainModalLabel"><span></span> 各觀測站降雨量資料</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-sm">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">代號</th>
                        <th scope="col">名稱</th>
                        <th scope="col">海拔高度</th>
                        <th scope="col">經度</th>
                        <th scope="col">緯度</th>
                        <th scope="col">地址</th>
                        <th scope="col">過去1hr降雨量</th>
                        <th scope="col">過去24hr降雨量</th>
                      </tr>
                    </thead>
                    <tbody id="rainTableBody">
                        <tr>
                            <td>466850</td>
                            <td>五分山雷達站</td>
                            <td>756</td>
                            <td>121.7812</td>
                            <td>25.0712</td>
                            <td>梧棲區臺灣大道十段2號海港大樓6樓</td>
                            <td class="text-right">24 mm</td>
                            <td class="text-right">100 mm</td>
                        </tr>
                        <tr>
                            <td>466850</td>
                            <td>五分山雷達站</td>
                            <td>756</td>
                            <td>121.7812</td>
                            <td>25.0712</td>
                            <td>梧棲區臺灣大道十段2號海港大樓6樓</td>
                            <td class="text-right">24 mm</td>
                            <td class="text-right">100 mm</td>
                        </tr>
                        <tr>
                            <td>466850</td>
                            <td>五分山雷達站</td>
                            <td>756</td>
                            <td>121.7812</td>
                            <td>25.0712</td>
                            <td>梧棲區臺灣大道十段2號海港大樓6樓</td>
                            <td class="text-right">24 mm</td>
                            <td class="text-right">100 mm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <script type="module" src="./js/script.js"></script>
</body>
</html>
