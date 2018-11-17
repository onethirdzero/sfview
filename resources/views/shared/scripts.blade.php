{{-- Scripts loaded from CDNs. --}}

{{-- We use 'defer' to delay the execution of scripts until the
DOM is ready for interaction. Also improves load times because
downloads are now in parallel. --}}
{{-- https://flaviocopes.com/javascript-async-defer/ --}}

{{-- Photo Sphere Viewer dependencies. --}}
<script defer type="text/javascript" src="https://cdn.rawgit.com/malko/D.js/v0.7.5/lib/D.min.js"></script>
<script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/uevent@1.0.0/uevent.min.js"></script>
<script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dot/1.1.2/doT.min.js"></script>
{{-- Version 98 seems to give this warning: https://github.com/mistic100/Photo-Sphere-Viewer/issues/238 --}}
{{-- We were on 97 during the checkpoint anyway, so we'll continue
to use that here. --}}
<script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/three.js/97/three.min.js"></script>
{{-- For gyroscope support on mobile devices. --}}
<script defer type="text/javascript" src="https://cdn.jsdelivr.net/gh/mrdoob/three.js/examples/js/controls/DeviceOrientationControls.js"></script>

{{-- Photo Sphere Viewer scripts.--}}
{{-- https://cdn.jsdelivr.net/npm/photo-sphere-viewer@3.4.1/dist/ --}}
<script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/photo-sphere-viewer@3.4.1/dist/photo-sphere-viewer.min.js"></script>

{{-- And we include compiled assets like this. --}}
<script defer src="{{ asset('js/app.js') }}"></script>
