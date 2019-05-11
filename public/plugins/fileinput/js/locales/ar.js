/*!
 * FileInput Arabic Translations
 *
 * This file must be loaded after 'fileinput.js'. Patterns in braces '{}', or
 * any HTML markup tags in the messages must not be converted or translated.
 *
 * @see http://github.com/kartik-v/bootstrap-fileinput
 * @author Yasser Lotfy <y_l@live.com>
 *
 * NOTE: this file must be saved in UTF-8 encoding.
 */
(function ($) {
    "use strict";

    $.fn.fileinputLocales['ar'] = {
        fileSingle: 'ملف',
        filePlural: 'ملفات',
        browseLabel: 'تصفح &hellip;',
        removeLabel: 'إزالة',
        removeTitle: 'إزالة الملفات المختارة',
        cancelLabel: 'إلغاء',
        cancelTitle: 'إنهاء الرفع الحالي',
        uploadLabel: 'رفع',
        uploadTitle: 'رفع الملفات المختارة',
        msgNo: 'لا',
        msgNoFilesSelected: 'لا يوجد ملفات مختارة',
        msgCancelled: 'ألغيت',
        msgPlaceholder: 'حدد {files}...',
        msgZoomModalHeading: 'معاينة تفصيلية',
        msgFileRequired: 'يجب تحدد ملف ليتم ترفيعه.',
        msgSizeTooSmall: 'الملف "{name}" (<b>{size} KB</b>) صغيراً جداً ويجب أن يكون أكبر من <b>{minSize} KB</b>.',
        msgSizeTooLarge: 'الملف "{name}" (<b>{size} ك.ب</b>) تعدى الحد الأقصى المسموح للرفع <b>{maxSize} ك.ب</b>.',
        msgFilesTooLess: 'يجب عليك اختيار <b>{n}</b> {files} على الأقل للرفع.',
        msgFilesTooMany: 'عدد الملفات المختارة للرفع <b>({n})</b> تعدت الحد الأقصى المسموح به لعدد <b>{m}</b>.',
        msgFileNotFound: 'الملف "{name}" غير موجود!',
        msgFileSecured: 'قيود أمنية تمنع قراءة الملف "{name}".',
        msgFileNotReadable: 'الملف "{name}" غير قابل للقراءة.',
        msgFilePreviewAborted: 'تم إلغاء معاينة الملف "{name}".',
        msgFilePreviewError: 'حدث خطأ أثناء قراءة الملف "{name}".',
        msgInvalidFileName: 'محرف غير مدعوم في اسم الملف "{name}".',
        msgInvalidFileType: 'نوعية غير صالحة للملف "{name}". فقط هذه النوعيات مدعومة "{types}".',
        msgInvalidFileExtension: 'امتداد غير صالح للملف "{name}". فقط هذه الملفات مدعومة "{extensions}".',
		initialCaption: 'لا يوجد ملفات مختارة',
        msgFileTypes: {
            'image': 'image',
            'html': 'HTML',
            'text': 'text',
            'video': 'video',
            'audio': 'audio',
            'flash': 'flash',
            'pdf': 'PDF',
            'object': 'object'
        },
        msgUploadAborted: 'تم إلغاء رفع الملف',
        msgUploadThreshold: 'Processing...',
        msgUploadBegin: 'Initializing...',
        msgUploadEnd: 'انتهت',
        msgUploadEmpty: 'لا يوجد بيانات صالحة متاحة ليتم ترفيعها',
        msgUploadError: 'خطأ',
        msgValidationError: 'خطأ التحقق من صحة',
        msgLoading: 'تحميل ملف {index} من {files} &hellip;',
        msgProgress: 'تحميل ملف {index} من {files} - {name} - {percent}% منتهي.',
        msgSelected: '{n} {files} مختار(ة)',
        msgFoldersNotAllowed: 'اسحب وأفلت الملفات فقط! تم تخطي {n} مجلد(ات).',
        msgImageWidthSmall: 'عرض ملف الصورة "{name}" يجب أن يكون على الأقل {size} px.',
        msgImageHeightSmall: 'طول ملف الصورة "{name}" يجب أن يكون على الأقل {size} px.',
        msgImageWidthLarge: 'عرض ملف الصورة "{name}" لا يمكن أن يتعدى {size} px.',
        msgImageHeightLarge: 'طول ملف الصورة "{name}" لا يمكن أن يتعدى {size} px.',
        msgImageResizeError: 'لم يتمكن من معرفة أبعاد الصورة لتغييرها.',
        msgImageResizeException: 'حدث خطأ أثناء تغيير أبعاد الصورة.<pre>{errors}</pre>',
        msgAjaxError: 'Something went wrong with the {operation} operation. Please try again later!',
        msgAjaxProgressError: '{operation} فشلت',
        ajaxOperations: {
            deleteThumb: 'file delete',
            uploadThumb: 'file upload',
            uploadBatch: 'batch file upload',
            uploadExtra: 'form data upload'
        },
        dropZoneTitle: 'اسحب وأفلت الملفات هنا &hellip;',
        dropZoneClickTitle: '<br>(or click to select {files})',
        fileActionSettings: {
            removeTitle: 'إزالة الملف',
            uploadTitle: 'رفع الملف',
            uploadRetryTitle: 'إعادة رفع الملف',
            downloadTitle: 'تحميل ملف',
            zoomTitle: 'مشاهدة التفاصيل',
            dragTitle: 'نقل / إعادة ترتيب',
            indicatorNewTitle: 'لم يتم الرفع بعد',
            indicatorSuccessTitle: 'تم الرفع',
            indicatorErrorTitle: 'خطأ بالرفع',
            indicatorLoadingTitle: 'جارٍ الرفع ...'
        },
        previewZoomButtonTitles: {
            prev: 'مشاهدة الملف السابق',
            next: 'مشاهدة الملف التالي',
            toggleheader: 'إخفاء \إظهار العنوان',
            fullscreen: 'ملئ الشاشة',
            borderless: 'إخفاء \إظهار الحدود',
            close: 'إغلاق معاينة الملف'
        }
    };
})(window.jQuery);
