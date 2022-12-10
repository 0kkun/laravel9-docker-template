// NOTE: 型定義ファイルが無いのが原因でvueファイルをimportするとエラーが発生するので追加
/* eslint-disable */
declare module '*.vue' {
	import type { DefineComponent } from 'vue'
	const component: DefineComponent<object, object, any>
	export default component
}
