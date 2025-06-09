<section class="calculator">
    <div class="container">
        <div class="box-shadow-white calculator-box">
            @if (!empty($field['heading']))
                <div class="section-title aligncenter">
                    <h2 class="section-title__text">
                        {{ $field['heading'] }}
                    </h2>
                </div>
            @endif

            <div class="calculator-form">
                <div class="calculator-form-row">

                    <div class="calculator-form-row__description">
                        <p class="calculator-form-row__description-text h6">
                            {{ $commercialTestText }}
                        </p>

                        @if (!empty($commercialTestTooltip))
                            <div class="calculator-form-tooltip">
                                {{ get_svg('resources.images.icon.question', ['class' => 'calculator-form-tooltip__icon']) }}
                                <span class="calculator-form-tooltip__text">
                                    {{ $commercialTestTooltip }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="calculator-form-inputs">
                        <div class="calculator-form-inputs__column">
                            <div class="calculator-form-input">
                                <div class="calculator__slider-track" id="volumeTrack"></div>
                                <input type="range" min="{{ $commercialTestMin }}" max="{{ $commercialTestMax }}"
                                    value="{{ $commercialTestMin }}" class="calculator__slider" id="volumeSlider">
                            </div>

                            <div class="calculator-form-inputs__range">
                                <span>
                                    {{ number_format($commercialTestMin, 0) }}
                                </span>
                                <span>
                                    {{ number_format($commercialTestMax, 0) }}
                                </span>
                            </div>

                        </div>

                        <div class="calculator-form-value">
                            <input type="number" min="20000" max="{{ $commercialTestMax }}"
                                value="{{ $commercialTestMin }}" class="calculator-form-value__input" id="volumeInput">
                        </div>

                    </div>
                </div>

                <div class="calculator-form-row">

                    <div class="calculator-form-row__description">
                        <p class="calculator-form-row__description-text h6">
                            {{ $commercialAvgText }}
                        </p>

                        @if (!empty($commercialAvgTooltip))
                            <div class="calculator-form-tooltip">
                                {{ get_svg('resources.images.icon.question', ['class' => 'calculator-form-tooltip__icon']) }}
                                <span class="calculator-form-tooltip__text">
                                    {{ $commercialAvgTooltip }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="calculator-form-inputs">
                        <div class="calculator-form-inputs__column">
                            <div class="calculator-form-input">
                                <div class="calculator__slider-track" id="valueTrack"></div>
                                <input type="range" min="{{ $commercialAvgMin }}" max="{{ $commercialAvgMax }}"
                                    value="{{ $commercialAvgMin }}" class="calculator__slider" id="valueSlider">
                            </div>

                            <div class="calculator-form-inputs__range">
                                <span>{{ $commercialAvgMin }}</span>
                                <span>{{ $commercialAvgMax }}</span>
                            </div>

                        </div>

                        <div class="calculator-form-value">
                            <input type="number" min="{{ $commercialAvgMin }}" max="{{ $commercialAvgMax }}"
                                value="{{ $commercialAvgMin }}" class="calculator__value-input" id="valueInput">
                        </div>

                    </div>
                </div>

                <div class="calculator-form-summary">
                    <div class="calculator-form-summary-amount h4">
                        <span id="resultAmount" class="calculator-form-summary-amount__cost display-small">48 000</span>
                        <div class="calculator-form-summary-amount__row">
                            <span class="calculator-form-summary-amount__currency">€</span>
                            <span class="calculator-form-summary-amount__period">/{{ __('month', 'labplus') }}</span>
                        </div>
                    </div>
                    <div class="calculator-form-summary__subtitle h6">
                        {{ __('Additional monthly revenue', 'labplus') }}
                    </div>
                    <div class="calculator-form-summary-description">
                        {{ __('from recommended follow-up tests', 'labplus') }}
                    </div>
                </div>

                @if ($howIsCalculatedTooltip)
                    <div class="calculator-form-info">
                        <span class="calculator-form-info__text">
                            {{ __('How is this calculated', 'labplus') }}
                        </span>

                        <div class="calculator-form-tooltip">
                            {{ get_svg('resources.images.icon.question', ['class' => 'calculator-form-tooltip__icon']) }}
                            <span class="calculator-form-tooltip__text">
                                {{ $howIsCalculatedTooltip }}
                            </span>
                        </div>
                    </div>
                @endif

                @if ($link)
                    <div class="calculator-form-button">
                        <a class="btn btn-primary" href="{{ $link['url'] }}" target="{{ $link['target'] }}">
                            {{ $link['title'] }}
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
