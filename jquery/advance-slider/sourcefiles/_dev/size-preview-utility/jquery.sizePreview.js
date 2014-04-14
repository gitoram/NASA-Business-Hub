/*
	Name: Size Preview utility for Advanced Slider
*/
(function($) {
	
	function SizePreview(instance, options) {
		
		var sliderElement = $(instance),
			sliderInstance = sliderElement.advancedSlider(),
			
			controlsContainer = $('<div id="controls-container"></div>')
				.appendTo(sliderElement)
				.html('<span class="size-text">Slider Size: </span>' + 
					   '<input class="size-input" id="slider-width-input" type="text" value=""/>' + 
					   '<span class="size-text"> X </span>' + 
					   '<input class="size-input" id="slider-height-input" type="text" value=""/>' +
					   '<br/>' +
					   '<span class="size-text">Slide' + '&nbsp;&nbsp;' + 'Size: </span> ' + 
					   '<input class="size-input" id="slide-width-input" type="text" value=""/>' + 
					   '<span class="size-text"> X </span>' + 
					   '<input class="size-input" id="slide-height-input" type="text" value=""/>' +
					   '<br/>' +
					   '<input type="button" id="preview-size-button" value="Preview Size"/>');
				
		
		var sliderWidthInput = controlsContainer.find('#slider-width-input'),
			sliderHeightInput = controlsContainer.find('#slider-height-input'),
			slideWidthInput = controlsContainer.find('#slide-width-input'),
			slideHeightInput = controlsContainer.find('#slide-height-input'),
			previewSizeButton = controlsContainer.find('#preview-size-button'),
			
			fluidWidth = (sliderInstance.settings.width).toString().indexOf('%') != -1,
			fluidHeight = (sliderInstance.settings.height).toString().indexOf('%') != -1;
		
		
		controlsContainer.addClass('size-preview');
		
		
		previewSizeButton.click(function(event) {
			event.preventDefault();
			
			if (!fluidWidth)
				sliderElement.css('width', sliderWidthInput.val());
			
			if (!fluidHeight)
				sliderElement.css('height', sliderHeightInput.val());
			
			sliderInstance.doSliderLayout();
		});
		
		
		if (fluidWidth) {
			sliderWidthInput.addClass('disabled')
							.attr('readonly', 'readonly');
			
			slideWidthInput.addClass('disabled')
						   .attr('readonly', 'readonly');
		}
		
		if (fluidHeight) {
			sliderHeightInput.addClass('disabled')
							 .attr('readonly', 'readonly');
			
			slideHeightInput.addClass('disabled')
							.attr('readonly', 'readonly');
		}
		
		
		function sizeLiveUpdate() {		
			var widthDiff = parseInt(sliderWidthInput.val()) - parseInt(slideWidthInput.val()),
				heightDiff = parseInt(sliderHeightInput.val()) - parseInt(slideHeightInput.val());
				
			
			sliderWidthInput.bind('propertychange input keyup paste', function(event) {
				slideWidthInput.val(parseInt($(this).val()) - widthDiff);
			});
			
				
			slideWidthInput.bind('propertychange input keyup paste', function(event) {
				sliderWidthInput.val(parseInt($(this).val()) + widthDiff);
			});
			
			
			sliderHeightInput.bind('propertychange input keyup paste', function(event) {
				slideHeightInput.val(parseInt($(this).val()) - heightDiff);
			});
			
			
			slideHeightInput.bind('propertychange input keyup paste', function(event) {
				sliderHeightInput.val(parseInt($(this).val()) + heightDiff);
			});
		}
		
				
		sliderInstance.settings.doSliderLayout = function() {			
			sliderWidthInput.val(sliderInstance.getSize().sliderWidth);
			sliderHeightInput.val(sliderInstance.getSize().sliderHeight);
			slideWidthInput.val(sliderInstance.getSize().slideWidth);
			slideHeightInput.val(sliderInstance.getSize().slideHeight);
			
			sizeLiveUpdate();
		};
		
		
		sliderInstance.doSliderLayout();		
	}
	
	
	$.fn.sizePreview = function(options) {
		var collection = [];
		
		for (var i = 0; i < this.length; i++) {
			if (!this[i].sizePreviewInstance)
				this[i].sizePreviewInstance = new SizePreview(this[i], options);
			
			collection.push(this[i].sizePreviewInstance);
		}
		
		return collection.length > 1 ? collection : collection[0];
	}
	
})(jQuery)