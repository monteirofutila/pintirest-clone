import './bootstrap';

import notifications from 'alpinejs-notify'
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm'

Alpine.plugin(notifications)

Livewire.start()
