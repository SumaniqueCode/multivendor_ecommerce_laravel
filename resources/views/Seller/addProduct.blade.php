@extends('Seller.Layout.layout')
@section('content')

<div class="">
    <div class="form my-8 grid grid-cols-12">
        @if(session('success'))
        <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white"><span>{{ session('success') }}</span></div>
        @endif
        <div class="col-span-12">
            <form class="max-w-6xl mx-auto mx-2 border-2 border-green-400 p-4 rounded-2xl" method="post" action="/product/add-product" enctype="multipart/form-data">
                @csrf
                <legend class="font-bold text-center text-2xl mb-5">ADD PRODUCT DETAILS</legend>
                <div class="grid grid-cols-12">
                    <div class="mb-5 name mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Product Name<span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-300 @enderror" placeholder="Enter product title" required>
                        @error('name')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 category mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="category" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category<span class="text-red-500">*</span></label>
                        <select id="category" name="category_id" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('category_id') border-red-300 @enderror">
                            <option id="" name="" value="" class="">Select Category</option>
                            @foreach ($categories as $category)
                                <option id="" name="" value="{{$category->id}}" class="">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 price mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="price" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price<span class="text-red-500">*</span></label>
                        <input type="text" id="price" name="price" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('price') border-red-300 @enderror" placeholder="Enter the price here" required>
                        @error('price')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 desc mx-1 col-span-12 sm:col-span-6 md:col-span-4 row-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Product Description<span class="text-red-500">*</span></label>
                        <textarea type="text" id="description" name="description" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm pb-20 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('description') border-red-300 @enderror" placeholder="Enter minumum 100 words" required></textarea>
                        @error('description')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 product_color mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="color" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Color</label>
                        <input type="text" id="color" name="color" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('color') border-red-300 @enderror" placeholder="Eg: Red" >
                        @error('color')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 product_size mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="size" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Size</label>
                        <input type="text" id="size" name="size" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('size') border-red-300 @enderror" placeholder="Enter dimension or size" >
                        @error('size')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 brand mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="brand" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Brand</label>
                        <input type="text" id="brand" name="brand" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('brand') border-red-300 @enderror" placeholder="Leave empty if not available">
                        @error('brand')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 model mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="model" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Model</label>
                        <input type="text" id="model" name="model" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('model') border-red-300 @enderror" placeholder="Leave empty if not available">
                        @error('model')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 iamge mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="image" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Image<span class="text-red-500">*</span></label>
                        <input type="file" id="image" name="image" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('image') border-red-300 @enderror">
                        @error('image')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="stock" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product in Stock<span class="text-red-500">*</span></label>
                        <input type="number" id="stock" name="stock" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('stock') border-red-300 @enderror" placeholder="Enter number of stocks" required>
                        @error('stock')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 country mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="origin" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country Of Origin<span class="text-red-500">*</span></label>
                        <select name="origin" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('origin_country') border-red-300 @enderror">
                            <option value="">Select Country</option>
                            <option value="Afganistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bonaire">Bonaire</option>
                            <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Canary Islands">Canary Islands</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Channel Islands">Channel Islands</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos Island">Cocos Island</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote DIvoire">Cote D'Ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Curaco">Curacao</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor">East Timor</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands">Falkland Islands</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Ter">French Southern Ter</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Great Britain">Great Britain</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Hawaii">Hawaii</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea North">Korea North</option>
                            <option value="Korea Sout">Korea South</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia">Macedonia</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Midway Islands">Midway Islands</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Nambia">Nambia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherland Antilles">Netherland Antilles</option>
                            <option value="Netherlands">Netherlands (Holland, Europe)</option>
                            <option value="Nevis">Nevis</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau Island">Palau Island</option>
                            <option value="Palestine">Palestine</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Phillipines">Philippines</option>
                            <option value="Pitcairn Island">Pitcairn Island</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                            <option value="Republic of Serbia">Republic of Serbia</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="St Barthelemy">St Barthelemy</option>
                            <option value="St Eustatius">St Eustatius</option>
                            <option value="St Helena">St Helena</option>
                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                            <option value="St Lucia">St Lucia</option>
                            <option value="St Maarten">St Maarten</option>
                            <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                            <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                            <option value="Saipan">Saipan</option>
                            <option value="Samoa">Samoa</option>
                            <option value="Samoa American">Samoa American</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Tahiti">Tahiti</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Erimates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States of America">United States of America</option>
                            <option value="Uraguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City State">Vatican City State</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                            <option value="Wake Island">Wake Island</option>
                            <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zaire">Zaire</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                            @error('origin_country')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 col-span-12 mx-auto">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-8 mt-5 py-2.5 text-center">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
</div>

@endsection