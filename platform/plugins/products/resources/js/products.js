$(() => {
    'use strict'

    BDashboard.loadWidget($('#widget_productsposts_recent').find('.widget-content'), route('productsposts.widget.recent-productsposts'))
})
