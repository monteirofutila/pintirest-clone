<div x-data="{
    notify: function(message) {
        this.$notify(message, {
            wrapperId: 'notificationWrapper',
            templateId: 'notificationAlert',
            autoClose: 3000,
            autoRemove: 4000,
        })
    }
}" x-on:flash-message.dot.window="notify($event.detail.message)" @session('flash-message')
    x-init="notify('{{ $value }}')" @endsession>
    <div id="notificationWrapper" class="z-50 fixed w-max left-0 right-0 bottom-10 mx-auto space-y-2"></div>

    <template id="notificationAlert">
        <div role="alert"
            class="animate-fade-up animate-once animate-duration-100 animate-fill-forwards text-white bg-gray-950 px-4 py-3 rounded-lg">
            {notificationText}
        </div>
    </template>
</div>
