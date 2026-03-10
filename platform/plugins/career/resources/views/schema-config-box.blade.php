<div class="career-schema-items">
    {!! Form::repeater('Career_schema_config', $value, [
        [
            'type' => 'textarea',
            'label' => trans('plugins/career::career.question'),
            'required' => true,
            'attributes' => [
                'name' => 'question',
                'value' => null,
                'options' => [
                    'class' => 'form-control',
                    'data-counter' => 1000,
                    'rows' => 1,
                ],
            ],
        ],
        [
            'type' => 'textarea',
            'label' => trans('plugins/career::career.answer'),
            'required' => true,
            'attributes' => [
                'name' => 'answer',
                'value' => null,
                'options' => [
                    'class' => 'form-control',
                    'data-counter' => 1000,
                    'rows' => 1,
                ],
            ],
        ],
    ]) !!}
</div>

<div class="d-inline">
    <span>{{ trans('plugins/career::career.or') }}</span>
    <a href="javascript:void(0)" data-bb-toggle="select-from-existing">
        {{ trans('plugins/career::career.select_from_existing') }}
    </a>
</div>

<div class="existing-career-schema-items mt-2" @style(['display: none' => empty($selectedCareers) || ! $careers])>
    @if($careers)
        {{ Form::multiChecklist('selected_existing_Careers[]', $selectedCareers, $careers, [], false, false, true) }}
    @else
        <p class="text-muted mb-0">
            {!! BaseHelper::clean(trans(
                'plugins/career::career.no_existing',
                ['link' => Html::link(route('career.create'), trans('plugins/career::career.Careers_menu_name'), ['target' => '_blank'])])
            ) !!}
        </p>
    @endif
</div>
