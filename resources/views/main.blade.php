<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font.css') }}" rel="stylesheet">
    <title>Laravel - Vue - Test</title>
</head>

<!-- No bootstrap -->
<!-- It's no adaptive/resistive layout! -->
<body>
    <div class="container">
        <div class="content">
            <!-- Overlay -->
            <div id="overlay-container" class="overlay-container">
                <div class="overlay-container-box">
                    <div class="overlay-container-box-content">
                        <div class="overlay-message">
                            Error!<br>Here is error from the server
                        </div>
                        <div class="overlay-buttons">
                            <div class="overlay-button overlay-button-cancel">Cancel</div>
                            <div class="overlay-button overlay-button-ok">Okey</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Overlay -- END -->

            <div class="app-header">
                <span>Laravel - Vue - Test app</span>
            </div>
            <div class="app-container">
                <div class="app-content">
                

                    <!-- Service Card -->
                    <div class="app-title">
                        <div class="app-title-current">Service Card</div>
                        <div class="app-title-back">Back to Service List</div>
                    </div>

                    <div class="app-add-line">
                        <div class="app-add-line-label">Name:</div>
                        <div class="app-add-line-card-value">
                            Name Here
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Description:</div>
                        <div class="app-add-line-card-value">
                            Description
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Activity:</div>
                        <div class="app-add-line-card-value">
                            Active
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Type:</div>
                        <div class="app-add-line-card-value">
                            Some Type
                        </div>
                    </div>

                    <div class="app-list-add">
                        <div class="app-list-add-button">Edit</div>
                    </div>
                    <!-- Service Card -- END -->

                    <!-- Add new service -->
                    <div class="app-title">
                        <div class="app-title-current">Add new service</div>
                        <div class="app-title-back">Back to Service List</div>
                    </div>

                    <div class="app-add-line">
                        <div class="app-add-line-label">Name:</div>
                        <div class="app-add-line-input-container">
                            <input type="text" placeholder="Input name here">
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Description:</div>
                        <div class="app-add-line-input-container">
                            <input type="text" placeholder="Input description here">
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Activity:</div>
                        <div class="app-add-line-input-container">
                            <select>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Type:</div>
                        <div class="app-add-line-input-container">
                            <select>
                                <option value="1">Type 1</option>
                                <option value="2">Type 2</option>
                                <option value="3">Type 3</option>
                                <option value="4">Type 4</option>
                            </select>
                        </div>
                    </div>

                    <div class="app-list-add">
                        <div class="app-list-add-button">Create Service</div>
                    </div>
                    <!-- Add new service -- END -->


                    <!-- List of services -->
                    <div class="app-title">
                        <div class="app-title-current">List of Services</div>
                        <div class="app-title-back"></div>
                    </div>
                    <div class="app-list">
                        <ul>
                            <li>
                                <div class="app-list-item-name-and-description">
                                    <div class="app-list-item-name">Name 1111</div>
                                    <div class="app-list-item-description">Description 1111</div>
                                </div>
                                <div class="app-list-item-type">Some type</div>
                                <div class="app-list-item-type app-list-item-type-activity">Active</div>
                                <div class="app-list-item-state" title="View Service Card">
                                    <img src="/img/eye.png">
                                </div>
                                <div class="app-list-item-state" title="Edit Service Info">
                                    <img src="/img/edit.png">
                                </div>
                                <div class="app-list-item-state" title="Delete Service">
                                    <img src="/img/bin.png">
                                </div>
                            </li>
                            <li>
                                <div class="app-list-item-name-and-description">
                                    <div class="app-list-item-name">Name 2222</div>
                                    <div class="app-list-item-description">Description 2222</div>
                                </div>
                                <div class="app-list-item-type">Some type 2</div>
                                <div class="app-list-item-type app-list-item-type-activity">Inactive</div>
                                <div class="app-list-item-state" title="View Service Card">
                                    <img src="/img/eye.png">
                                </div>
                                <div class="app-list-item-state" title="Edit Service Info">
                                    <img src="/img/edit.png">
                                </div>
                                <div class="app-list-item-state" title="Delete Service">
                                    <img src="/img/bin.png">
                                </div>
                            </li>
                        </ul>
                        <div class="app-list-add">
                            <div class="app-list-add-button">Add New Service</div>
                        </div>
                    </div>
                    <!-- List of services -- END -->



                </div>
            </div>
        </div>
    </div>
</body>
</html>
