<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>

<form id="change_widget_form">

	<table>
		<tbody>
			<tr>
				<td>
					<div class="theme-container">
						<div class="theme-content float-left" style="background: #ee6e73">
						</div>
						<div class="theme-content float-right" style="background: #9e9e9e">
						</div>
					</div>
				</td>
				<td>
					<input class="with-gap" name="theme" type="radio" id="default" value="default" @if(Auth::user()->theme == 'default') checked @endif/>
				      <label for="default">
				        <span>Default</span>
				      </label>
				</td>
			</tr>

			<tr>
				<td>
					<div class="theme-container">
						<div class="theme-content float-left" style="background: #0b1863">
						</div>
						<div class="theme-content float-right" style="background: #abc3f9">
						</div>
					</div>
				</td>
				<td>
					<input class="with-gap" name="theme" type="radio" id="ocean" value="ocean" @if(Auth::user()->theme == 'ocean') checked @endif/>
				      <label for="ocean">
				        <span>Ocean</span>
				      </label>
				</td>
			</tr>

			<tr>
				<td>
					<div class="theme-container">
						<div class="theme-content float-left" style="background: #ff8250">
						</div>
						<div class="theme-content float-right" style="background: #ffbb3e">
						</div>
					</div>
				</td>
				<td>
					<input class="with-gap" name="theme" type="radio" id="sunset" value="sunset" @if(Auth::user()->theme == 'sunset') checked @endif/>
				      <label for="sunset">
				        <span>Sunset</span>
				      </label>
				</td>
			</tr>

			<tr>
				<td>
					<div class="theme-container">
						<div class="theme-content float-left" style="background: #1a8824e0">
						</div>
						<div class="theme-content float-right" style="background: #795548">
						</div>
					</div>
				</td>
				<td>
					<input class="with-gap" name="theme" type="radio" id="mountain" value="mountain" @if(Auth::user()->theme == 'mountain') checked @endif/>
				      <label for="mountain">
				        <span>Mountain</span>
				      </label>
				</td>
			</tr>
		</tbody>
	</table>
    
</form>